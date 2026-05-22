<?php

namespace App\Livewire\admin\client;

use App\Livewire\PicklioComponent;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Traits\SortingTrait;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class ClientDashboard extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $account;

    public $categories;

    public $category;

    public $orderItems;

    public function mount(): void
    {
        $this->account = $this->userConnected->account;
        $this->categories = ProductCategory::all();
        $this->orderItems = OrderItem::with(['product.stock', 'product.productCategory'])
            ->where('merchant_id', $this->account->id)
            ->get();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete(Product $product)
    {
        $product->stock->delete();
        $product->stockMovements()->delete();
        if ($product->delete()) {
            Flux::toast(__('client.products.toast.delete.success'), variant: 'success');
            Flux::modal('delete-merchant')->close();
        } else {
            Flux::toast(__('client.products.toast.delete.error'), variant: 'danger');
        }
    }

    #[Computed]
    public function products()
    {
        return Product::with([
            'stock',
            'productCategory',
        ])
            ->whereAccount($this->account->id)
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
        return number_format($this->orderItems->sum('price') / 100, 2, ',', ' ') . ' €';
    }

    public function render()
    {
        return view('livewire.admin.client.dashboard')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.dashboard').' | Client');
    }
}
