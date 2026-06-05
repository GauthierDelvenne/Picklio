<?php

namespace App\Livewire\Front;

use App\Livewire\Form\Front\SendMerchantMessageForm;
use App\Livewire\PicklioComponent;
use App\Mail\NewMerchantAdminMessageMail;
use App\Mail\NewMerchantMessageMail;
use App\Models\Account;
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
        $message = $this->form->create();
        if ($message) {
            $this->dispatch('form-sent');
            $account = Account::where('id', $this->form->recipient_id)->first();
            $email = $account->email;
            Mail::to($this->form->email)->send(new NewMerchantMessageMail);
            Mail::to($email)->send(new NewMerchantAdminMessageMail($message, $this->form->name));
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
