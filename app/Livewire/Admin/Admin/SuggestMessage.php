<?php

namespace App\Livewire\Admin\Admin;

use App\Livewire\PicklioComponent;
use App\Models\MessageStatus;
use App\Models\SuggestMessage as SuggestMessageModel;
use Flux\Flux;
use Illuminate\Support\Facades\Cache;

class SuggestMessage extends PicklioComponent
{
    public SuggestMessageModel $suggestMessage;
    public function validateMessage()
    {
        SuggestMessageModel::updateOrCreate([
            'id' => $this->suggestMessage->id,
        ], [
            'message_status_id' => MessageStatus::VALID,
        ]);
        Flux::toast(__('admin.messages.toast.update.success'), variant: 'success');
        Cache::forget("unread_messages_{$this->userConnected->id}");
    }

    public function refuseMessage()
    {
        SuggestMessageModel::updateOrCreate([
            'id' => $this->suggestMessage->id,
        ], [
            'message_status_id' => MessageStatus::UNVALID,
        ]);
        Flux::toast(__('admin.messages.toast.update.success'), variant: 'success');
        Cache::forget("unread_messages_{$this->userConnected->id}");
    }
    public function delete()
    {
        if ($this->suggestMessage->delete()) {
            Flux::toast(__('admin.messages.toast.delete.success'), variant: 'success');
            Flux::modal('delete-message')->close();
            $this->redirectRoute('admin.message.index');
        } else {
            Flux::toast(__('admin.messages.toast.delete.error'), variant: 'danger');
        }
    }

    public function mount(SuggestMessageModel $suggestMessage)
    {
        $this->suggestMessage = $suggestMessage;
    }

    public function render()
    {
        return view('livewire.admin.admin.suggest-message')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.suggestMessage').' | Admin');
    }
}
