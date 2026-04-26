<?php

namespace App\Livewire\auth;

use App\Livewire\form\auth\LoginForm;
use App\Livewire\PicklioComponent;

class Login extends PicklioComponent
{
    public LoginForm $form;

    public function login()
    {
        if ($this->form->authenticate()) {
            // TODO : Peut-être revoir le redirect en fonction du compte ou juste rediriger sur la home et la personne va ou elle veut en fonction de ce qu'elle veut faire
            $this->redirectRoute('front.home', navigate: true);
        } else {

        }
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.auth')->title(__('commons.pageName.auth.login'));
    }
}
