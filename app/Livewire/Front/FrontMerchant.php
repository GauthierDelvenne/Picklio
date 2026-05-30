<?php

namespace App\Livewire\Front;

use App\Livewire\form\Front\SendMerchantMessageForm;
use App\Livewire\PicklioComponent;
use App\Mail\NewMerchantMessageMail;
use App\Models\Warehouse;
use Mail;

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
            Mail::to($this->form->email)->send(new NewMerchantMessageMail);
            $this->form->reset();
        }
    }

    public function render()
    {
        return view('livewire.front.merchant')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.merchant').' | Picklio');
    }
}
