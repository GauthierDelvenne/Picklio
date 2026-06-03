<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\PicklioComponent;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Stock;
use App\Traits\SortingTrait;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class ClientDashboard extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;
    public $statu;

    public $account;

    public $categories;

    public $category;

    public $orderItems;

    public function mount(): void
    {
        $this->account = $this->userConnected->account;
        $this->categories = ProductCategory::orderby('name', 'asc')->get();
        $this->orderItems = OrderItem::with(['product.stock', 'product.productCategory'])
            ->where('merchant_id', $this->account->id)
            ->get();
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function delete(Product $product)
    {
        $productUpdated = $product->update([
            'name' => $product->name . ' (' . __('words.no-dispo') . ')',
            'is_active' => false,
        ]);
        if ($productUpdated) {
            Flux::toast(__('client.products.toast.delete.success'), variant: 'success');
        } else {
            Flux::toast(__('client.products.toast.delete.error'), variant: 'danger');
        }
    }
    #[Computed]
    public function status()
    {
        return [
            Stock::LOW,
            Stock::VERYLOW,
        ];
    }
    #[Computed]
    public function products()
    {
        return Product::with([
            'stock',
            'productCategory',
        ])
            ->whereHas('stock', function ($query) {
                $query->where('status', '!=', Stock::GOOD)
                    ->when($this->statu, function ($query) {
                        $query->where('status', $this->statu);
                    });
            })
            ->whereAccount($this->account->id)
            ->whereNot('products.is_active', 0)
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->when($this->category, function ($query) {
                $query->where('product_category_id', $this->category);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);
    }

    #[Computed]
    public function bestSellers()
    {
        $orderItems = $this->orderItems;
        if ($orderItems->isEmpty()) {
            return;
        }

        return $orderItems
            ->groupBy('product.id')
            ->map(function ($orderItems) {
                return [
                    'product' => $orderItems->first()->product,
                    'quantity' => $orderItems->sum('quantity'),
                ];
            })
            ->sortByDesc('quantity')
            ->take(10);
    }

    #[Computed]
    public function orderItem()
    {
        return $this->orderItems->count();
    }

    #[Computed]
    public function totalSale()
    {
        return number_format($this->orderItems->sum('price') / 100, 2, ',', ' ').' €';
    }

    public function render()
    {
        return view('livewire.admin.client.dashboard')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.dashboard').' | Client');
    }
}
