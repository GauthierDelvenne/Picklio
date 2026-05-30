<?php

namespace App\Livewire\Auth;

use App\Livewire\form\Auth\RegisterForm;
use App\Livewire\PicklioComponent;
use App\Mail\RegisterMail;
use Auth;
use Illuminate\Support\Facades\Mail;

class Register extends PicklioComponent
{
    public RegisterForm $form;

    public function register()
    {
        $user = $this->form->register();
        if (! empty($user)) {
            Mail::to($this->form->email)->send(new RegisterMail($user));
            Auth::login($user);
            $this->redirectRoute('front.home', navigate: true);
        } else {

        }
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.auth')->title(__('commons.pageName.auth.register'));
    }
}
