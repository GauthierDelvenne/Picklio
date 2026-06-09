<?php

namespace App\Livewire\Admin\Admin;

use App\Livewire\PicklioComponent;
use App\Models\ContactMessage as ContactMessageModel;
use App\Models\MessageStatus;
use App\Models\Role;
use Flux\Flux;
use Illuminate\Support\Facades\Cache;

class ContactMessage extends PicklioComponent
{
    public ContactMessageModel $contactMessage;

    public function readMessage()
    {
        ContactMessageModel::updateOrCreate([
            'id' => $this->contactMessage->id,
        ], [
            'message_status_id' => MessageStatus::READ,
        ]);
        Flux::toast(__('admin.messages.toast.update.success'), variant: 'success');
        Cache::forget("unread_messages_{$this->userConnected->id}");
    }

    public function delete()
    {
        if ($this->contactMessage->delete()) {
            Flux::toast(__('admin.messages.toast.delete.success'), variant: 'success');
            Flux::modal('delete-message')->close();
            if ($this->userConnected->account->role_id == Role::ADMIN) {
                $this->redirectRoute('admin.message.index');
            }
            if ($this->userConnected->account->role_id == Role::MERCHANT) {
                $this->redirectRoute('client.message.index');
            }        } else {
            Flux::toast(__('admin.messages.toast.delete.error'), variant: 'danger');
        }
    }

    public function mount(ContactMessageModel $contactMessage)
    {
        $this->contactMessage = $contactMessage;
    }

    public function render()
    {
        if ($this->userConnected->account->role_id == Role::ADMIN) {
            return view('livewire.admin.admin.contact-message')
                ->layout('layouts.admin')
                ->title(__('commons.pageName.admin.admin.contactMessage').' | Admin');
        } elseif ($this->userConnected->account->role_id == Role::MERCHANT) {
            return view('livewire.admin.admin.contact-message')
                ->layout('layouts.client')
                ->title(__('commons.pageName.admin.admin.contactMessage').' | Admin');
        }
    }
}
