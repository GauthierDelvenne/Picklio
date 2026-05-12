<?php

namespace App\Livewire\form\front;

use App\Models\Account;
use App\Models\MessageStatus;
use App\Models\NewMerchantMessage;
use App\Models\Role;
use App\Models\SuggestMessage;
use Livewire\Component;
use Livewire\Form;

class SendMerchantMessageForm extends Form
{
    public $firstname;
    public $lastname;
    public $name;
    public $email;
    public $description;
    public $address;
    public $postal_code;
    public $country = 'BE';
    public $message_status_id = MessageStatus::UNREAD;
    public $recipient_id;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->recipient_id = Account::where('role_id', Role::ADMIN)->first()->id;
    }

    public function create()
    {
        $validatedData = $this->validate();
        NewMerchantMessage::create($validatedData);
        return true;
    }

    public function rules()
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'postal_code' => 'required|integer',
            'country' => 'required|string',
            'message_status_id' => 'required',
            'recipient_id' => 'required|exists:accounts,id',
        ];
    }

    public function validationAttributes()
    {
        return [
            'firstname' => strtolower(__('front.merchant.contactSection.contactContainer.form.firstname.attribute')),
            'lastname' => strtolower(__('front.merchant.contactSection.contactContainer.form.lastname.attribute')),
            'name' => strtolower(__('front.merchant.contactSection.contactContainer.form.name.attribute')),
            'email' => strtolower(__('front.merchant.contactSection.contactContainer.form.email.attribute')),
            'description' => strtolower(__('front.merchant.contactSection.contactContainer.form.description.attribute')),
            'address' => strtolower(__('front.merchant.contactSection.contactContainer.form.address.attribute')),
            'postal_code' => strtolower(__('front.merchant.contactSection.contactContainer.form.postal_code.attribute')),
            'country' => strtolower(__('front.merchant.contactSection.contactContainer.form.country.attribute')),
            'message_status_id' => strtolower(__('admin.messages.form.status.attribute')),
            'recipient_id' => strtolower(__('admin.messages.form.recipient.attribute')),
        ];
    }
}
