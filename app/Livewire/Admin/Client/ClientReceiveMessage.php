<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\PicklioComponent;
use App\Models\Message;
use App\Models\MessageStatus;
use Flux\Flux;
use Illuminate\Support\Facades\Cache;

class ClientReceiveMessage extends PicklioComponent
{
    public Message $receiveMessage;

    public function readMessage()
    {
        Message::updateOrCreate([
            'id' => $this->receiveMessage->id,
        ], [
            'message_status_id' => MessageStatus::READ,
        ]);
        Flux::toast(__('admin.messages.toast.update.success'), variant: 'success');
        Cache::forget("unread_messages_{$this->userConnected->id}");
    }

    public function delete()
    {
        if ($this->receiveMessage->delete()) {
            Flux::toast(__('admin.messages.toast.delete.success'), variant: 'success');
            Flux::modal('delete-message')->close();
            $this->redirectRoute('admin.message.index');
        } else {
            Flux::toast(__('admin.messages.toast.delete.error'), variant: 'danger');
        }
    }

    public function mount(Message $receiveMessage)
    {
        $this->receiveMessage = $receiveMessage;
    }

    public function render()
    {
        return view('livewire.admin.client.receive-message')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.receiveMessage').' | Client');
    }
}
