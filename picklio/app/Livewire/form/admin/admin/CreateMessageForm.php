<?php

namespace App\Livewire\form\admin\admin;

use App\Models\Account;
use App\Models\Message;
use App\Models\MessageStatus;
use Livewire\Component;
use Livewire\Form;

class CreateMessageForm extends Form
{
    public $messageStatuses;

    public $title;

    public $description;

    public $status_id = MessageStatus::UNREAD;

    public $recipient_id;

    public $recipients;

    public $sender_id = '';

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->messageStatuses = MessageStatus::all();
        $this->sender_id = $component->userConnected->account->id;
        $this->recipients = Account::with('user')->merchants()->get();
    }

    public function create()
    {
        $validatedData = $this->validate();
        Message::create([
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
