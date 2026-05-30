<?php

namespace App\Livewire\Form\Admin\Admin;

use App\Models\Account;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Form;

class UpdateOrCreateMerchantForm extends Form
{
    public $account;

    public $name;

    public $firstname;

    public $lastname;

    public $description;

    public $email;

    public $phone;

    public $statuses;

    public $status_id = Status::ACTIVE;

    public $postal_code;

    public $address;

    public $country = 'BE';

    public $role_id = Role::MERCHANT;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->statuses = Status::all();
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
        $this->status_id = $this->account->status_id;
        $this->postal_code = $this->account->postal_code;
        $this->address = $this->account->address;
        $this->country = $this->account->country;
        $this->role_id = $this->account->role_id;
    }

    public function updateOrCreate()
    {
        $validatedData = $this->validate();
        $user = User::updateOrCreate(
            ['email' => $validatedData['email']],
            ['name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => \Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );
        Account::updateOrCreate(
            ['user_id' => $user->id],
            $validatedData

        );

        return $user;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'description' => 'nullable|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->account?->user_id),
            ],            'phone' => 'nullable',
            'status_id' => 'required',
            'postal_code' => 'required',
            'address' => 'required|string',
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
            'status_id' => strtolower(__('admin.merchants.form.status.attribute')),
            'postal_code' => strtolower(__('admin.merchants.form.postal_code.attribute')),
            'address' => strtolower(__('admin.merchants.form.address.attribute')),
            'country' => strtolower(__('admin.merchants.form.country.attribute')),
        ];
    }
}
