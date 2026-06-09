<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\Form\Admin\Client\CreateMessageForm;
use App\Livewire\PicklioComponent;
use App\Mail\ClientMessageMail;
use App\Mail\MessageMail;
use App\Models\Account;
use App\Models\ContactMessage;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Traits\SortingTrait;
use Flux\Flux;
use Illuminate\Support\Facades\Mail;
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
    public $sendStatus;

    public $sendSearch;

    public $account;

    public CreateMessageForm $form;

    public function mount(): void
    {
        $this->sortBy = 'message_status_id';
        $this->account = $this->userConnected->account;
        $this->messageStatuses = [
            '2', '4'
        ];
    }

    public function create()
    {
        $message = $this->form->create();
        if ($message) {
            Flux::toast(__('admin.messages.toast.create.success'), variant: 'success');
            Flux::modal('send-message')->close();
            $account = Account::where('id', $this->form->recipient_id)->first();
            $email = $account->email;
            $sender = Account::where('id', $this->form->sender_id)->first();
            Mail::to($email)->send(new ClientMessageMail($sender, $message));
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
            ->with(['recipient.user'])
            ->when($this->sendSearch, function ($query) {
                $query->where('users.name', 'like', '%' . $this->sendSearch . '%');
            })
            ->when($this->sendStatus, function ($query) {
                $query->where('messages.message_status_id', $this->sendStatus);
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
