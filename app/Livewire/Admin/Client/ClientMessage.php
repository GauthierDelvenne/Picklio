<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\Form\Admin\Client\UpdateMessageForm;
use App\Livewire\PicklioComponent;
use App\Models\Message;
use Flux\Flux;

class ClientMessage extends PicklioComponent
{
    public Message $message;
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
            $this->redirectRoute('client.message.index');
        } else {
            Flux::toast(__('admin.messages.toast.delete.error'), variant: 'danger');
        }
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
