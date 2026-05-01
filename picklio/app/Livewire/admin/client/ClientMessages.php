<?php

namespace App\Livewire\admin\client;

use App\Livewire\PicklioComponent;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Traits\SortingTrait;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class ClientMessages extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $messageStatus;
    public $messageStatuses;
    public $account;

    public function mount(): void
    {
        $this->sortBy = 'users.name';
        $this->account = $this->userConnected->account;
        $this->messageStatuses = MessageStatus::all();
    }

    public function updatedMessageStatus()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Computed]
    public function messages()
    {
        return Message::join('accounts', 'messages.sender_id', '=', 'accounts.id')
            ->join('users', 'accounts.user_id', '=', 'users.id')
            ->where('recipient_id', $this->account->id)
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

    public function render()
    {
        return view('livewire.admin.client.messages')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.messages') . ' | Client');
    }
}
