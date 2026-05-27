<?php

namespace App\Livewire\form\admin\client;

use App\Models\Account;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Models\Role;
use Livewire\Component;
use Livewire\Form;

class UpdateMessageForm extends Form
{
    public $message;
    public $messageStatuses;

    public $title;

    public $description;

    public $status_id = MessageStatus::UNREAD;

    public $recipient_id;

    public $recipients;

    public $sender_id;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->messageStatuses = MessageStatus::all();
        $this->message = $component->message;
        $this->setProperties();
    }

    public function setProperties()
    {
        $this->title = $this->message->title;
        $this->description = $this->message->description;
        $this->sender_id = $this->message->sender_id;
        $this->recipient_id = $this->message->recipient_id;
        $this->status_id = $this->message->message_status_id;
    }

    public function update()
    {
        $validatedData = $this->validate();
        Message::updateOrCreate(['id' => $this->message->id], [
            'sender_id' => $this->sender_id,
            'recipient_id' => $validatedData['recipient_id'],
            'message_status_id' => $this->status_id,
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return true;
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
