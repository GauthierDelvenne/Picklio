<?php

namespace App\Livewire\form\admin\client\setting;

use App\Models\Account;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Form;

class UpdateAccountForm extends Form
{
    public $user;

    public $account;

    public $name;

    public $firstname;

    public $lastname;

    public $description;

    public $email;

    public $phone;

    public $address;

    public $postal_code;

    public $country;

    public $role_id;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->user = $component->userConnected;
        $this->account = $this->user->account;
        $this->setProperties();
    }

    public function setProperties()
    {
        if (! $this->account) {
            return;
        }
        $this->name = $this->account->user->name ?? null;
        $this->firstname = $this->account->firstname;
        $this->lastname = $this->account->lastname;
        $this->description = $this->account->description;
        $this->email = $this->account->user->email ?? null;
        $this->phone = $this->account->phone;
        $this->address = $this->account->address;
        $this->postal_code = $this->account->postal_code;
        $this->country = $this->account->country;
        $this->role_id = $this->account->role_id;
    }

    public function update()
    {
        $validatedData = $this->validate();
        User::updateOrCreate(
            ['id' => $this->user->id],
            [
                'name' => $validatedData['firstname'].' '.$validatedData['lastname'],
                'email' => $validatedData['email'],
            ]
        );
        Account::updateOrCreate(
            ['id' => $this->account->id],
            $validatedData
        );

        return true;
    }

    public function rules()
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'description' => 'nullable|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->account?->user_id),
            ], 'phone' => 'nullable',
            'address' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'role_id' => 'required',
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => strtolower(__('admin.merchants.form.name.attribute')),
            'firstname' => strtolower(__('admin.merchants.form.firstname.attribute')),
            'lastname' => strtolower(__('admin.merchants.form.lastname.attribute')),
            'description' => strtolower(__('admin.merchants.form.description.attribute')),
            'email' => strtolower(__('admin.merchants.form.email.attribute')),
            'phone' => strtolower(__('admin.merchants.form.phone.attribute')),
            'address' => strtolower(__('admin.merchants.form.address.attribute')),
            'postal_code' => strtolower(__('admin.merchants.form.postal_code.attribute')),
            'country' => strtolower(__('admin.merchants.form.country.attribute')),
        ];
    }
}
