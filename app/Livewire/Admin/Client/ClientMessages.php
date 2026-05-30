<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\Form\Admin\Client\CreateMessageForm;
use App\Livewire\PicklioComponent;
use App\Models\ContactMessage;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Traits\SortingTrait;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class ClientMessages extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $messageStatus;

    public $messageStatuses;

    public $contactStatus;

    public $contactSearch;

    public $account;

    public CreateMessageForm $form;

    public function mount(): void
    {
        $this->sortBy = 'users.name';
        $this->account = $this->userConnected->account;
        $this->messageStatuses = MessageStatus::all();
    }

    public function create()
    {
        if ($this->form->create()) {
            Flux::toast(__('admin.messages.toast.create.success'), variant: 'success');
            Flux::modal('send-message')->close();
            $this->form->reset();
        } else {
            Flux::toast(__('admin.messages.toast.create.error'), variant: 'danger');
        }

    }

    public function updated()
    {
        $this->resetPage();
    }

    #[Computed]
    public function messages()
    {
        return Message::message($this->account->id)
            ->when($this->search, function ($query) {
                $query->where('users.name', 'like', '%' . $this->search . '%');
            })
            ->when($this->messageStatus, function ($query) {
                $query->where('messages.message_status_id', $this->messageStatus);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);
    }

    #[Computed]
    public function contactMessages()
    {
        return ContactMessage::contactMessage($this->account->id)
            ->when($this->contactSearch, function ($query) {
                $query->where('name', 'like', '%' . $this->contactSearch . '%');
            })
            ->when($this->contactStatus, function ($query) {
                $query->where('contact_messages.message_status_id', $this->contactStatus);
            })
            ->paginate(15);
    }
    #[Computed]
    public function sendMessages()
    {
        return Message::ownMessage($this->account->id)
            ->when($this->search, function ($query) {
                $query->where('users.name', 'like', '%'.$this->search.'%');
            })
            ->when($this->messageStatus, function ($query) {
                $query->where('messages.message_status_id', $this->messageStatus);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);
    }
    public function render()
    {
        return view('livewire.admin.client.messages')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.messages') . ' | Client');
    }
}
