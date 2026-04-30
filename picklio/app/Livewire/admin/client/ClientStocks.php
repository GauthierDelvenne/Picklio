<?php

namespace App\Livewire\admin\client;

use App\Livewire\PicklioComponent;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Traits\SortingTrait;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class ClientStocks extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $account;

    public $categories;

    public $category;

    public function mount(): void
    {
        $this->account = $this->userConnected->account;
        $this->categories = ProductCategory::all();
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
        return Product::with('stock')
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
    public function discountCount()
    {
        return Product::whereAccount($this->account->id)
            ->where('start_at', '<=', now())
            ->where('end_at', '>=', now())
            ->count();
    }

    #[Computed]
    public function veryLowStockCount()
    {
        return Product::where('products.account_id', $this->account->id)
            ->join('stocks', 'stocks.product_id', '=', 'products.id')
            ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->where('stocks.quantity', '<=', 'product_categories.capacity * 0.10')
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.client.stocks')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.stocks').' | Client');
    }
}
