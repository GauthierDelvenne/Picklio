<?php

namespace App\Livewire\Admin\Admin;

use App\Livewire\form\admin\Admin\Setting\UpdateAccountForm;
use App\Livewire\form\admin\Admin\Setting\UpdateWarehouseForm;
use App\Livewire\PicklioComponent;
use Flux\Flux;

class Settings extends PicklioComponent
{
    public UpdateAccountForm $accountForm;
    public UpdateWarehouseForm $warehouseForm;
    public $countries;

    public function mount()
    {
        $this->countries = config('countries');
    }
    public function updateAccount() {
        if ($this->accountForm->update()) {
            Flux::toast(__('admin.settings.accounts.toast.update.success'), variant: 'success');
        } else {
            Flux::toast(__('admin.settings.accounts.toast.update.error'), variant: 'danger');
        }
    }
    public function updateWarehouse() {
        if ($this->warehouseForm->update()) {
            Flux::toast(__('admin.settings.warehouse.toast.update.success'), variant: 'success');
        } else {
            Flux::toast(__('admin.settings.warehouse.toast.update.error'), variant: 'danger');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin.settings')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.settings').' | Admin');
    }
}
