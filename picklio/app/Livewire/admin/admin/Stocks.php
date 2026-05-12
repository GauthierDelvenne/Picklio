<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use App\Models\Account;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Traits\SortingTrait;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class Stocks extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $account;

    public $categories;

    public $category;

    public $merchants;

    public $merchant;

    public function mount(): void
    {
        $this->account = $this->userConnected->account;
        $this->categories = ProductCategory::all();
        $this->merchants = Account::where('role_id', Role::MERCHANT)->get();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function updatedMerchant()
    {
        $this->resetPage();
    }

    #[Computed]
    public function products()
    {
        return Product::with(['stock', 'productCategory', 'account.user'])
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->when($this->category, function ($query) {
                $query->where('product_category_id', $this->category);
            })
            ->when($this->merchant, function ($query) {
                $query->where('account_id', $this->merchant);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);
    }

    #[Computed]
    public function veryLowStockCount()
    {
        return Product::veryLowStock()
            ->count();
    }

    #[Computed]
    public function lowStockCount()
    {
        return Product::lowStock()
            ->count();
    }

    #[Computed]
    public function lastAddProductsActivities()
    {
        return Product::with(['stock', 'account.user'])
            ->where('created_at', '>=', now()->subDays(3))
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();
    }

    #[Computed]
    public function lastUpdateProductsActivities()
    {
        return Product::with(['stock', 'account.user'])
            ->where('updated_at', '>=', now()->subDays(3))
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.admin.stocks')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.stocks').' | Admin');
    }
}
