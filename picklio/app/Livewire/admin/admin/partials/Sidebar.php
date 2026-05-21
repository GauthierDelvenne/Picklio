<?php

namespace App\Livewire\admin\admin\partials;

use App\Livewire\PicklioComponent;
use App\Models\ContactMessage;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Models\NewMerchantMessage;
use App\Models\SuggestMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class Sidebar extends PicklioComponent
{
    public $messageCount;

    public function mount(): void
    {
        $this->messageCount = Cache::remember("unread_messages_{$this->userConnected->id}", 60,
            function () {
                return Message::where('message_status_id', MessageStatus::UNREAD)
                    ->where('recipient_id', $this->userConnected->account->id)
                    ->count()
                    + SuggestMessage::where('message_status_id', MessageStatus::UNREAD)
                        ->count()
                    + NewMerchantMessage::where('message_status_id', MessageStatus::UNREAD)
                        ->count()
                    + ContactMessage::where('message_status_id', MessageStatus::UNREAD)
                        ->where('recipient_id', $this->userConnected->account->id)
                        ->count();
            });

    }

    public function render(): View
    {
        return view('partials.admin.admin.sidebar');
    }
}
