<?php

namespace App\Livewire\Form\Auth;

use App\Models\Account;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Form;

class RegisterForm extends Form
{
    public $firstname;

    public $lastname;

    public $email;

    public $password;

    public $role = Role::CLIENT;

    public $remember = false;

    public function register()
    {
        $validatedData = $this->validate();
        $user = User::create([
            'name' => $validatedData['firstname'] . ' ' . $validatedData['lastname'],
            'password' => Hash::make($validatedData['password']),
            'email' => $validatedData['email'],
            'remember_token' => Str::random(10),
        ]);

        Account::create([
            'user_id' => $user->id,
            'role_id' => $validatedData['role'],
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
        ]);

        return $user;
    }

    public function rules()
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/',
            'role' => 'required|integer',
        ];
    }

    public function validationAttributes()
    {
        return [
            'firstname' => strtolower(__('auth.form.firstname.attribute')),
            'lastname' => strtolower(__('auth.form.lastname.attribute')),
            'email' => strtolower(__('auth.form.email.attribute')),
            'password' => strtolower(__('auth.form.password.attribute')),
            'remember' => strtolower(__('auth.form.remember.attribute')),
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => __('auth.form.password.regex'),
        ];
    }
}
