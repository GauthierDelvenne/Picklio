<?php

namespace App\Livewire\admin\admin;

use App\Livewire\form\admin\admin\UpdateOrCreateMerchantForm;
use App\Livewire\PicklioComponent;
use App\Models\Account;
use Flux\Flux;

class Merchant extends PicklioComponent
{
    public Account $account;
    public $countries;

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
    public function render()
    {
        return view('livewire.admin.admin.merchant')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.merchant') . ' | Admin');
    }
}
