<?php

namespace App\Livewire\front;

use App\Livewire\form\front\SendMessageForm;
use App\Livewire\PicklioComponent;
use App\Mail\SuggestMessageMail;
use App\Models\Account;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Traits\SortingTrait;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Mail;

class Catalogues extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $searchMerchant;

    public $merchant = [];
    #[Url]
    public $category = [];

    public $categories;

    public SendMessageForm $form;

    public function mount(): void
    {
        $this->categories = ProductCategory::all();
    }

    public function sendMessage()
    {
        if ($this->form->create()) {
            $this->dispatch('form-sent');
            Mail::to($this->form->email)->send(new SuggestMessageMail);
            $this->form->reset();
        }
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedMerchant()
    {
        $this->resetPage();
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function sortByPrice()
    {
        $this->sortBy = 'price';
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->resetPage();
    }

    public function sortByName()
    {
        $this->sortBy = 'name';
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->resetPage();
    }

    #[Computed]
    public function products()
    {
        return Product::with([
            'stock',
            'productCategory',
            'account',
        ])
            ->where('is_active', 1)
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->when($this->category, function ($query) {
                $query->whereIn('product_category_id', $this->category);
            })
            ->when($this->merchant, function ($query) {
                $query->whereIn('account_id', $this->merchant);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);
    }

    #[Computed]
    public function merchants()
    {
        return Account::join('users', 'users.id', 'accounts.user_id')
            ->with('user')
            ->when($this->searchMerchant, function ($query) {
                $query->where('users.name', 'like', '%'.$this->searchMerchant.'%');
            })
            ->where('role_id', Role::MERCHANT)
            ->get();
    }

    public function render()
    {
        return view('livewire.front.catalogue')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.catalogue').' | Picklio');
    }
}
