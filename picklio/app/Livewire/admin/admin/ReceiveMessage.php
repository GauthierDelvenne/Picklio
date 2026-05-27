<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use App\Models\Message;
use App\Models\MessageStatus;
use Flux\Flux;
use Illuminate\Support\Facades\Cache;

class ReceiveMessage extends PicklioComponent
{
    public Message $receiveMessage;

    public function validateMessage()
    {
        Message::updateOrCreate([
            'id' => $this->receiveMessage->id,
        ], [
            'message_status_id' => MessageStatus::VALID,
        ]);
        Flux::toast(__('admin.messages.toast.update.success'), variant: 'success');
        Cache::forget("unread_messages_{$this->userConnected->id}");
    }

    public function refuseMessage()
    {
        Message::updateOrCreate([
            'id' => $this->receiveMessage->id,
        ], [
            'message_status_id' => MessageStatus::UNVALID,
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
        return view('livewire.admin.admin.receive-message')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.receiveMessage').' | Admin');
    }
}
