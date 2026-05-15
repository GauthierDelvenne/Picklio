<?php

namespace App\Livewire\admin\client\partials;

use App\Livewire\PicklioComponent;
use App\Models\ContactMessage;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Models\NewMerchantMessage;
use App\Models\SuggestMessage;
use Illuminate\Contracts\View\View;

class Sidebar extends PicklioComponent
{
    public $messageCount;

    public function mount(): void
    {
        $message = Message::where('message_status_id', MessageStatus::UNREAD)->where('messages.recipient_id', $this->userConnected->account->id)->count();
        $contactMessage = ContactMessage::where('message_status_id', MessageStatus::UNREAD)->where('contact_messages.recipient_id', $this->userConnected->account->id)->count();

        $this->messageCount = $message + $contactMessage;
    }

    public function render(): View
    {
        return view('partials.admin.client.sidebar');
    }
}
