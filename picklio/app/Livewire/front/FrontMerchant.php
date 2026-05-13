<?php

namespace App\Livewire\front;

use App\Livewire\form\front\SendMerchantMessageForm;
use App\Livewire\PicklioComponent;
use App\Models\Warehouse;

class FrontMerchant extends PicklioComponent
{
    public $countries;
    public $warehouse;

    public SendMerchantMessageForm $form;

    public function mount(): void
    {
        $this->countries = config('countries');
        $this->warehouse = Warehouse::first();
    }

    public function sendMessage()
    {
        if ($this->form->create()) {
            $this->dispatch('form-sent');
            $this->form->reset();
        }
    }

    public function render()
    {
        return view('livewire.front.merchant')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.merchant') . ' | Picklio');
    }
}
