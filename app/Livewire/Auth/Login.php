<?php

namespace App\Livewire\Auth;

use App\Livewire\Form\Auth\LoginForm;
use App\Livewire\PicklioComponent;
use App\Models\Role;

class Login extends PicklioComponent
{
    public LoginForm $form;

    public function login()
    {
        $auth = $this->form->authenticate()->account;
        if (! empty($auth)) {
            if ($auth->role_id === Role::ADMIN || $auth->role_id === Role::WAREHOUSE) {
                $this->redirectRoute('admin.dashboard');
            } elseif ($auth->role_id === Role::MERCHANT) {
                $this->redirectRoute('client.dashboard');
            } elseif ($auth->role_id === Role::CLIENT) {
                $this->redirectRoute('front.home');
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.auth')->title(__('commons.pageName.auth.login'));
    }
}
