<?php

namespace App\Livewire\Auth\Password;

use App\Livewire\PicklioComponent;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;

class ResetPassword extends PicklioComponent
{
    public string $token = '';

    public string $email = '';

    public string $password = '';

    public function mount($token): void
    {
        $this->token = $token;
        $this->email = request()->string('email');
    }

    public function resetPassword()
    {
        $valid = $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email:rfc'],
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
        $this->dispatch('success');
        $this->redirectRoute('auth.login');
    }

    public function render()
    {
        return view('livewire.auth.password.reset-password')
            ->layout('layouts.auth')->title(__('commons.pageName.auth.password.reset-password'));
    }
}
