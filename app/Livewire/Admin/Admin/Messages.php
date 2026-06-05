<?php

namespace App\Livewire\Admin\Admin;

use App\Livewire\Form\Admin\Admin\CreateMessageForm;
use App\Livewire\PicklioComponent;
use App\Mail\CancelOrderMail;
use App\Mail\MessageMail;
use App\Models\Account;
use App\Models\ContactMessage;
use App\Models\Message;
use App\Models\NewMerchantMessage;
use App\Models\SuggestMessage;
use App\Traits\SortingTrait;
use Flux\Flux;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class Messages extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $account;

    public $search;
    public $sendSearch;
    public $sendStatus;

    public $messageStatus;

    public $suggestMessageStatus;

    public $suggestSearch;

    public $newMerchantStatus;

    public $newMerchantSearch;

    public $contactStatus;

    public $contactSearch;

    public CreateMessageForm $form;

    public function mount(): void
    {
        $this->sortBy = 'users.name';
        $this->account = $this->userConnected->account;
    }

    public function updated()
    {
        $this->resetPage();
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
            Mail::to($email)->send(new MessageMail($sender, $message));
            $this->form->reset();
        } else {
            Flux::toast(__('admin.messages.toast.create.error'), variant: 'danger');
        }
    }

    public function deleteSuggest(SuggestMessage $suggestMessage)
    {
        if ($suggestMessage->delete()) {
            Flux::toast(__('admin.messages.toast.delete.success'), variant: 'success');
            Flux::modal('delete-message')->close();
        } else {
            Flux::toast(__('admin.messages.toast.delete.error'), variant: 'danger');
        }
    }

    public function delete(Message $message)
    {
        if ($message->delete()) {
            Flux::toast(__('admin.messages.toast.delete.success'), variant: 'success');
            Flux::modal('delete-message')->close();
        } else {
            Flux::toast(__('admin.messages.toast.delete.error'), variant: 'danger');
        }
    }

    public function deleteNewMerchant(NewMerchantMessage $newMerchantMessages)
    {
        if ($newMerchantMessages->delete()) {
            Flux::toast(__('admin.messages.toast.delete.success'), variant: 'success');
            Flux::modal('delete-message')->close();
        } else {
            Flux::toast(__('admin.messages.toast.delete.error'), variant: 'danger');
        }
    }

    #[Computed]
    public function messages()
    {
        return Message::message($this->account->id)
            ->when($this->search, function ($query) {
                $query->where('users.name', 'like', '%'.$this->search.'%');
            })
            ->when($this->messageStatus, function ($query) {
                $query->where('messages.message_status_id', $this->messageStatus);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);
    }

    #[Computed]
    public function suggestMessages()
    {
        return SuggestMessage::join('accounts', 'suggest_messages.recipient_id', '=', 'accounts.id')
            ->select('suggest_messages.*')
            ->when($this->suggestSearch, function ($query) {
                $query->where('name', 'like', '%'.$this->suggestSearch.'%');
            })
            ->when($this->suggestMessageStatus, function ($query) {
                $query->where('suggest_messages.message_status_id', $this->suggestMessageStatus);
            })
            ->paginate(15);
    }

    #[Computed]
    public function newMerchantMessages()
    {
        return NewMerchantMessage::join('accounts', 'new_merchant_messages.recipient_id', '=', 'accounts.id')
            ->select('new_merchant_messages.*')
            ->when($this->newMerchantSearch, function ($query) {
                $query->where('name', 'like', '%'.$this->newMerchantSearch.'%');
            })
            ->when($this->newMerchantStatus, function ($query) {
                $query->where('new_merchant_messages.message_status_id', $this->newMerchantStatus);
            })
            ->paginate(15);
    }

    #[Computed]
    public function contactMessages()
    {
        return ContactMessage::contactMessage($this->account->id)
            ->when($this->contactSearch, function ($query) {
                $query->where('name', 'like', '%'.$this->contactSearch.'%');
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
                $query->where('users.name', 'like', '%'.$this->sendSearch.'%');
            })
            ->when($this->sendStatus, function ($query) {
                $query->where('messages.message_status_id', $this->sendStatus);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);
    }

    public function render()
    {
        return view('livewire.admin.admin.messages')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.messages').' | Admin');
    }
}
