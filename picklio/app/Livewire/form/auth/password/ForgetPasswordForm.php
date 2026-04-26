<?php

namespace App\Livewire\form\auth\password;

use Illuminate\Support\Facades\Password;
use Livewire\Form;

class ForgetPasswordForm extends Form
{
    public $email;

    public function forgetPassword()
    {
        $validatedData = $this->validate();
        if ($validatedData) {
            Password::sendResetLink(['email' => $validatedData['email']]);
        }
    }


    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
        ];
    }

    public function validationAttributes()
    {
        return [
            'email' => strtolower(__('auth.form.email.attribute')),
        ];
    }
}
