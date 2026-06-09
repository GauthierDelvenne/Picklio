<?php

namespace App\Livewire\Form\Front;

use App\Models\Account;
use App\Models\User;
use Livewire\Component;
use Livewire\Form;

class UpdateProfilForm extends Form
{
    public $user;
    public $account;

    public $firstname;

    public $lastname;

    public $email;

    public $phone;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);

        $this->user = $component->userConnected;
        if (!empty($this->user)) {
            $this->account = $this->user->account;
            $this->setProperties();
        }
    }

    public function setProperties()
    {
        $this->firstname = $this->account->firstname;
        $this->lastname = $this->account->lastname;
        $this->email = $this->account->email;
        $this->phone = $this->account->phone;
    }

    public function update()
    {
        $validatedData = $this->validate();
        User::updateOrCreate([
            'id' => $this->user->id,
        ], [
            'name' => $validatedData['firstname'] . ' ' . $validatedData['lastname'],
            'email' => $validatedData['email'],
        ]);
        Account::updateOrCreate([
            'id' => $this->account->id,
        ], [
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
        ]);
        return true;
    }

    public function rules()
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
        ];
    }

    public function validationAttributes()
    {
        return [
            'firstname' => strtolower(__('front.profil.informationContainer.form.firstname.attribute')),
            'lastname' => strtolower(__('front.profil.informationContainer.form.lastname.attribute')),
            'email' => strtolower(__('front.profil.informationContainer.form.email.attribute')),
            'phone' => strtolower(__('front.profil.informationContainer.form.phone.attribute')),
        ];
    }
}
