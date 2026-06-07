<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\PicklioComponent;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Stock;
use App\Models\StockStatus;
use App\Traits\SortingTrait;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class ClientStocks extends PicklioComponent
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
    #[Computed]
    public function status()
    {
        return [
            StockStatus::GOOD,
            StockStatus::LOW,
            StockStatus::VERYLOW,
        ];
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
    public function products()
    {
        return Product::with([
            'stock',
            'productCategory',
        ])
            ->whereHas('stock', function ($query) {
                $query->when($this->statu, function ($query) {
                    $query->where('stock_status_id', $this->statu);
                });
            })
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
    public function veryLowStockCount()
    {
        return Product::where('products.account_id', $this->account->id)
            ->veryLowStock()
            ->count();
    }
    #[Computed]
    public function bestSeller()
    {
        $orderItems = $this->orderItems;
        if ($orderItems->isEmpty()) {
            return [];
        }

        return $orderItems
            ->groupBy('product.id')
            ->map(function ($orderItems) {
                return [
                    'product' => $orderItems->first()->product,
                ];
            })
            ->sortByDesc('quantity')
            ->first();
    }
    public function render()
    {
        return view('livewire.admin.client.stocks')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.stocks').' | Client');
    }
}
