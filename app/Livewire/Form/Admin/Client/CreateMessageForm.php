<?php

namespace App\Livewire\Form\Admin\Client;

use App\Models\Account;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Models\Role;
use Livewire\Component;
use Livewire\Form;

class CreateMessageForm extends Form
{

    public $title;

    public $description;

    public $status_id = MessageStatus::UNREAD;

    public $recipient_id;

    public $recipients;

    public $sender_id;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->sender_id = $component->userConnected->account->id;
        $this->recipient_id = Account::where('role_id', Role::ADMIN)->first()->id;
    }

    public function create()
    {
        $validatedData = $this->validate();
        $message = Message::create([
            'sender_id' => $this->sender_id,
            'recipient_id' => $validatedData['recipient_id'],
            'message_status_id' => $this->status_id,
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return $message;
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'status_id' => 'required',
            'recipient_id' => 'required|exists:accounts,id',
            'sender_id' => 'required|exists:accounts,id',
        ];
    }

    public function validationAttributes()
    {
        return [
            'title' => strtolower(__('admin.messages.form.title.attribute')),
            'description' => strtolower(__('admin.messages.form.description.attribute')),
            'status_id' => strtolower(__('admin.messages.form.status.attribute')),
            'recipient_id' => strtolower(__('admin.messages.form.recipient.attribute')),
            'sender_id' => strtolower(__('admin.messages.form.sender.attribute')),

        ];
    }
}
