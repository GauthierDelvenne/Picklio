<?php

namespace App\Livewire\admin\admin\partials;

use App\Livewire\PicklioComponent;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Models\NewMerchantMessage;
use App\Models\Status;
use App\Models\SuggestMessage;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;

class Sidebar extends PicklioComponent
{
public $messageCount;
    public function mount(): void
    {
        $message = Message::where('message_status_id', MessageStatus::UNREAD)->count();
        $suggestMessage = SuggestMessage::where('message_status_id', MessageStatus::UNREAD)->count();
        $newMerchantMessage = NewMerchantMessage::where('message_status_id', MessageStatus::UNREAD)->count();

        $this->messageCount = $message + $suggestMessage + $newMerchantMessage;
    }

    public function render(): View
    {
        return view('partials.admin.admin.sidebar');
    }
}
