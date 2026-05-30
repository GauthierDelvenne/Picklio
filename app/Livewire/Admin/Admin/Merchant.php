<?php

namespace App\Livewire\Admin\Admin;

use App\Livewire\Form\Admin\Admin\UpdateOrCreateMerchantForm;
use App\Livewire\PicklioComponent;
use App\Models\Account;
use App\Models\Product;
use App\Traits\SortingTrait;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class Merchant extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;
    public Account $account;

    public $countries;
    public $search;

    public UpdateOrCreateMerchantForm $form;

    public function mount(string $merchant)
    {
        $this->account = Account::findOrFail($merchant);
        $this->form->account = $this->account;
        $this->form->setProperties();

        $this->countries = config('countries');
    }

    public function update()
    {
        if ($this->form->updateOrCreate()) {
            Flux::toast(__('admin.merchants.toast.update.success'), variant: 'success');
        } else {
            Flux::toast(__('admin.merchants.toast.update.error'), variant: 'danger');
        }
    }

    public function delete()
    {
        if ($this->account->delete()) {
            Flux::toast(__('admin.merchants.toast.delete.success'), variant: 'success');
            Flux::modal('delete-merchant')->close();
            $this->redirectRoute('admin.merchant.index');
        } else {
            Flux::toast(__('admin.merchants.toast.delete.error'), variant: 'danger');
        }
    }

    #[Computed]
    public function products()
    {
        return Product::with(['stock', 'productCategory', 'account.user'])
            ->where('account_id', $this->account->id)
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);
    }

    public function render()
    {
        return view('livewire.admin.admin.merchant')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.merchant').' | Admin');
    }
}
