<?php

namespace App\Livewire\admin\admin;

use App\Livewire\form\admin\admin\CreateMessageForm;
use App\Livewire\PicklioComponent;
use App\Models\Message;
use App\Models\NewMerchantMessage;
use App\Models\SuggestMessage;
use App\Traits\SortingTrait;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class Messages extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $messageStatus;

    public $suggestMessageStatus;

    public $suggestSearch;
    public $newMerchantStatus;
    public $newMerchantSearch;

    public CreateMessageForm $form;

    public function mount(): void
    {
        $this->sortBy = 'users.name';
    }

    public function updatedMessageStatus()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSuggestMessageStatus()
    {
        $this->resetPage();
    }

    public function updatedSuggestSearch()
    {
        $this->resetPage();
    }
    public function updatedNewMerchantStatus()
    {
        $this->resetPage();
    }

    public function updatedNewMerchantSearch()
    {
        $this->resetPage();
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

    public function delete(Message $message)
    {
        if ($message->delete()) {
            Flux::toast(__('admin.messages.toast.delete.success'), variant: 'success');
            Flux::modal('delete-message')->close();
        } else {
            Flux::toast(__('admin.messages.toast.delete.error'), variant: 'danger');
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
        return Message::join('accounts', 'messages.recipient_id', '=', 'accounts.id')
            ->join('users', 'accounts.user_id', '=', 'users.id')
            ->select('messages.*', 'users.name as name')
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

    public function render()
    {
        return view('livewire.admin.admin.messages')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.messages').' | Admin');
    }
}
