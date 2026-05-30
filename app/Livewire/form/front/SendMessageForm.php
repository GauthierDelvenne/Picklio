<?php

namespace App\Livewire\form\front;

use App\Models\Account;
use App\Models\MessageStatus;
use App\Models\Role;
use App\Models\SuggestMessage;
use Livewire\Component;
use Livewire\Form;

class SendMessageForm extends Form
{
    public $name;
    public $email;
    public $merchantSuggest;
    public $productSuggest;
    public $description;
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
        SuggestMessage::create($validatedData);
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'merchantSuggest' => 'nullable|string',
            'productSuggest' => 'nullable|string',
            'message_status_id' => 'required',
            'recipient_id' => 'required|exists:accounts,id',
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => strtolower(__('front.catalogue.contactSection.form.name.attribute')),
            'email' => strtolower(__('front.catalogue.contactSection.form.email.attribute')),
            'merchantSuggest' => strtolower(__('front.catalogue.contactSection.form.merchantSuggest.attribute')),
            'productSuggest' => strtolower(__('front.catalogue.contactSection.form.productSuggest.attribute')),
            'message_status_id' => strtolower(__('admin.messages.form.status.attribute')),
            'recipient_id' => strtolower(__('admin.messages.form.recipient.attribute')),
        ];
    }
}
