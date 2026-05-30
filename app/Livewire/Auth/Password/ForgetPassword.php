<?php

namespace App\Livewire\Auth\Password;

use App\Livewire\form\Auth\Password\ForgetPasswordForm;
use App\Livewire\PicklioComponent;

class ForgetPassword extends PicklioComponent
{
    public ForgetPasswordForm $form;

    public function forgetPassword()
    {
        if ($this->form->forgetPassword()) {
            $this->dispatch('success');
        }
    }

    public function render()
    {
        return view('livewire.auth.password.forget-password')
            ->layout('layouts.auth')->title(__('commons.pageName.auth.password.forget-password'));
    }
}
