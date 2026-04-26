<?php

namespace App\Livewire\form\auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Form;

class LoginForm extends Form
{
    public $email;

    public $password;

    public $remember = false;

    public function authenticate()
    {
        $validatedData = $this->validate();
        if (! Auth::attempt(
            ['email' => $validatedData['email'],
                'password' => $validatedData['password']],
            $validatedData['remember']
        )) {
            throw ValidationException::withMessages([
                'form.email' => __('auth.failed'),
            ]);
        }

        return $validatedData;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'boolean',
        ];
    }

    public function validationAttributes()
    {
        return [
            'email' => strtolower(__('auth.form.email.attribute')),
            'password' => strtolower(__('auth.form.password.attribute')),
            'remember' => strtolower(__('auth.form.remember.attribute')),
        ];
    }
}
