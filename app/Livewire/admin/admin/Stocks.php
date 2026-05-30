<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use App\Models\Account;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\Stock;
use App\Traits\SortingTrait;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class Stocks extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $account;

    public $category;

    public $statu;

    public $merchant;

    public function mount(): void
    {
        $this->account = $this->userConnected->account;
    }

    public function updated()
    {
        $this->resetPage();
    }

    #[Computed(persist: true)]
    public function categories()
    {
        return ProductCategory::all();
    }

    #[Computed]
    public function status()
    {
        return [
            Stock::GOOD,
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
                $query->when($this->statu, function ($query) {
                    $query->where('status', $this->statu);
                });
            })
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

    #[Computed(persist: true)]
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
