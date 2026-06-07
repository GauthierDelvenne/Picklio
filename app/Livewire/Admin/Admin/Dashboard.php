<?php

namespace App\Livewire\Admin\Admin;

use App\Livewire\PicklioComponent;
use App\Mail\CancelOrderMail;
use App\Models\Account;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\Status;
use App\Models\Stock;
use App\Traits\SortingTrait;
use Flux\Flux;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class Dashboard extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $productSearch;

    public $category;

    public $merchant;

    public $statu;

    public $sortByProductName;

    public function mount(): void
    {
        $this->sortBy = 'pickup_date';
        $this->sortByProductName = 'name';
    }

    public function updated()
    {
        $this->resetPage();
    }

    #[Computed]
    public function orders()
    {
        return Order::OrderInWait()
            ->when($this->search, function ($query) {
                $query->where('code', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->orderBy('pickup_slots.time', $this->sortDirection)
            ->paginate(15);
    }

    #[Computed(persist: true)]
    public function categories()
    {
        return ProductCategory::orderby('name', 'asc')->get();
    }

    #[Computed]
    public function status()
    {
        return [
            Stock::LOW,
            Stock::VERYLOW,
        ];
    }

    #[Computed(persist: true)]
    public function merchants()
    {
        return Account::where('role_id', Role::MERCHANT)->with('user')->get();
    }

    #[Computed]
    public function products()
    {
        return Product::with(['stock', 'productCategory', 'account.user'])
            ->whereHas('stock', function ($query) {
                $query->where('status', '!=', Stock::GOOD)
                    ->when($this->statu, function ($query) {
                        $query->where('status', $this->statu);
                    });
            })
            ->whereNot('products.is_active', 0)
            ->when($this->productSearch, function ($query) {
                $query->where('name', 'like', '%' . $this->productSearch . '%');
            })
            ->when($this->category, function ($query) {
                $query->where('product_category_id', $this->category);
            })
            ->when($this->merchant, function ($query) {
                $query->where('account_id', $this->merchant);
            })
            ->orderBy($this->sortByProductName, $this->sortDirection)
            ->paginate(15);
    }

    #[Computed]
    public function inWaitOrder()
    {
        return Order::where('order_status_id', OrderStatus::INWAIT)->count();
    }

    #[Computed]
    public function stockCount()
    {
        return Product::lowOrVeryLowStock()
            ->count();
    }

    #[Computed]
    public function merchantCount()
    {
        return Account::where('role_id', Role::MERCHANT)->count();
    }

    public function deleteOrder(Order $order)
    {
        $email = $order->account->email;
        if ($order->orderItems()->delete()) {
            $order->delete();
            Flux::toast(__('admin.orders.toast.delete.success'), variant: 'success');
            Mail::to($email)->send(new CancelOrderMail($order->code));
        } else {
            Flux::toast(__('admin.orders.toast.delete.error'), variant: 'danger');
        }
    }

    public function delete(Product $product)
    {
        $productUpdated = $product->update([
            'name' => $product->name . ' (' . __('words.no-dispo') . ')',
            'is_active' => false,
        ]);
        if ($productUpdated) {
            Flux::toast(__('client.products.toast.delete.success'), variant: 'success');
            Flux::modal('delete-merchant')->close();
        } else {
            Flux::toast(__('client.products.toast.delete.error'), variant: 'danger');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin.dashboard')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.dashboard') . ' | Admin');
    }
}
