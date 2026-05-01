<?php

namespace App\Livewire\admin\client;

use App\Models\Message;
use App\Models\MessageStatus;
use Flux\Flux;
use Livewire\Component;

class ClientMessage extends Component
{
    public Message $message;

    public function validateMessage()
    {
        Message::updateOrCreate([
            'id' => $this->message->id,
        ], [
            'message_status_id' => MessageStatus::VALID,
        ]);
        Flux::toast(__('admin.messages.toast.update.success'), variant: 'success');
    }

    public function refuseMessage()
    {
        Message::updateOrCreate([
            'id' => $this->message->id,
        ], [
            'message_status_id' => MessageStatus::UNVALID,
        ]);
        Flux::toast(__('admin.messages.toast.update.success'), variant: 'success');
    }

    public function mount(Message $message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.admin.client.message')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.message') . ' | Client');
    }
}
