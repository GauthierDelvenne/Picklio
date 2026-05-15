<?php

namespace App\Livewire\admin\admin;

use App\Livewire\form\admin\admin\UpdateMessageForm;
use App\Livewire\PicklioComponent;
use App\Models\Message as MessageModel;
use App\Models\Role;
use Flux\Flux;

class Message extends PicklioComponent
{
    public MessageModel $message;

    public UpdateMessageForm $form;

    public function update()
    {
        if ($this->form->update()) {
            Flux::toast(__('admin.messages.toast.update.success'), variant: 'success');
        } else {
            Flux::toast(__('admin.messages.toast.update.error'), variant: 'danger');
        }
    }

    public function delete()
    {
        if ($this->message->delete()) {
            Flux::toast(__('admin.messages.toast.delete.success'), variant: 'success');
            Flux::modal('delete-message')->close();
            $this->redirectRoute('admin.message.index');
        } else {
            Flux::toast(__('admin.messages.toast.delete.error'), variant: 'danger');
        }
    }

    public function mount(MessageModel $message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.admin.admin.message')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.message').' | Admin');
    }
}
