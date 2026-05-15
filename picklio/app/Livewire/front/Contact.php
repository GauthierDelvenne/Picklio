<?php

namespace App\Livewire\front;

use App\Livewire\form\front\SendContactForm;
use App\Livewire\PicklioComponent;
use App\Mail\ContactMail;
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
        $this->merchants = Account::where('role_id', Role::MERCHANT)->get();
    }

    public function sendForm()
    {
        if ($this->form->create()) {
            $this->dispatch('send-form');
            Mail::to($this->form->email)->send(new ContactMail);
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
