<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\Form\Admin\Client\Setting\UpdateAccountForm;
use App\Livewire\PicklioComponent;
use Flux\Flux;

class ClientSettings extends PicklioComponent
{
    public UpdateAccountForm $accountForm;
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
    public function render()
    {
        return view('livewire.admin.client.settings')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.settings') . ' | Client');
    }
}
