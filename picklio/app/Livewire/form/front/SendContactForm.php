<?php

namespace App\Livewire\form\front;

use App\Models\Account;
use App\Models\ContactMessage;
use App\Models\MessageStatus;
use App\Models\Role;
use Livewire\Component;
use Livewire\Form;

class SendContactForm extends Form
{
    public $name;
    public $email;
    public $phone;
    public $title;
    public $description;
    public $recipient_id;
    public $admin_id;

    public $message_status_id = MessageStatus::UNREAD;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->admin_id = Account::where('role_id', Role::ADMIN)->first()->id;
        $this->recipient_id = $this->admin_id;
    }

    public function create()
    {
        $validatedData = $this->validate();
        ContactMessage::create($validatedData);
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'message_status_id' => 'required',
            'recipient_id' => 'required|exists:accounts,id',
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => strtolower(__('front.contact.formContainer.form.name.attribute')),
            'email' => strtolower(__('front.contact.formContainer.form.email.attribute')),
            'phone' => strtolower(__('front.contact.formContainer.form.phone.attribute')),
            'title' => strtolower(__('front.contact.formContainer.form.title.attribute')),
            'description' => strtolower(__('front.contact.formContainer.form.description.attribute')),
            'message_status_id' => strtolower(__('admin.messages.form.status.attribute')),
            'recipient_id' => strtolower(__('admin.messages.form.recipient.attribute')),
        ];
    }
}
