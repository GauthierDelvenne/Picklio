<?php

namespace App\Livewire\Front;

use App\Livewire\Form\Front\SendContactForm;
use App\Livewire\PicklioComponent;
use App\Mail\ContactAdminMail;
use App\Mail\ContactMail;
use App\Mail\SuggestAdminMessageMail;
use App\Models\Account;
use App\Models\Role;
use App\Models\Warehouse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;

class Contact extends PicklioComponent
{
    public $warehouse;

    public $merchants;

    public SendContactForm $form;

    public function mount(): void
    {
        $this->warehouse = Warehouse::first();
        $this->merchants = Account::with('user')->where('role_id', Role::MERCHANT)->get();
    }

    public function sendForm()
    {
        $message = $this->form->create();
        if ($message) {
            $this->dispatch('send-form');
            $account = Account::where('id', $this->form->recipient_id)->first();
            $email = $account->email;
            $role = $account->role_id;
            Mail::to($this->form->email)->send(new ContactMail);
            Mail::to($email)->send(new ContactAdminMail($message, $role));
            $this->form->reset();
        }
    }

    public function render(): View
    {
        return view('livewire.front.contact')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.contact').' | Picklio');
    }
}
