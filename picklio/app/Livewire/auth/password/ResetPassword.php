<?php

namespace App\Livewire\auth\password;

use App\Livewire\PicklioComponent;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;

class ResetPassword extends PicklioComponent
{
    #[Locked]
    public string $token = '';

    public string $email = '';

    public string $password = '';

    public function mount(): void
    {
        $this->token = request()->string('token');
        $this->email = request()->string('email');
    }

    public function resetPassword()
    {
        $valid = $this->validate([
            'token' => ['required'],
            'email' => ['required',
                'string',
                'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/i',
                'email:rfc,dns',
            ],
            'password' => ['required', 'string', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/'],
        ], [
            'password.regex' => __('auth.form.password.regex'),
        ], [
            'password' => strtolower(__('auth.form.password.attribute')),
        ]);
        $status = Password::reset(
            $this->only('email', 'password', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('auth.login', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.password.reset-password')
            ->layout('layouts.auth')->title(__('commons.pageName.auth.password.reset-password'));
    }
}
