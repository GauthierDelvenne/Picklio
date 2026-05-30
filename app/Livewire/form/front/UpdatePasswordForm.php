<?php

namespace App\Livewire\form\front;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Form;

class UpdatePasswordForm extends Form
{
    public $user;
    public $password;
    public $current_password;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->user = $component->userConnected;
    }

    public function update()
    {
        $validatedData = $this->validate();
        User::updateOrCreate([
            'id' => $this->user->id,
        ], [
            'password' => Hash::make($validatedData['password']),
        ]);
        return true;
    }

    public function rules()
    {
        return [
            'current_password' => 'required|string|current_password:',
            'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/',
        ];
    }

    public function validationAttributes()
    {
        return [
            'current_password' => strtolower(__('front.profil.informationContainer.form.current_password.attribute')),
            'password' => strtolower(__('front.profil.informationContainer.form.password.attribute')),
        ];
    }
}
