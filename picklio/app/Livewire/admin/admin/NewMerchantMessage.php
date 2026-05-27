<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use App\Models\MessageStatus;
use App\Models\NewMerchantMessage as NewMerchantMessageModel;
use Flux\Flux;
use Illuminate\Support\Facades\Cache;

class NewMerchantMessage extends PicklioComponent
{
    public NewMerchantMessageModel $newMerchantMessage;
    public function validateMessage()
    {
        NewMerchantMessageModel::updateOrCreate([
            'id' => $this->newMerchantMessage->id,
        ], [
            'message_status_id' => MessageStatus::VALID,
        ]);
        Flux::toast(__('admin.messages.toast.update.success'), variant: 'success');
        Cache::forget("unread_messages_{$this->userConnected->id}");
    }

    public function refuseMessage()
    {
        NewMerchantMessageModel::updateOrCreate([
            'id' => $this->newMerchantMessage->id,
        ], [
            'message_status_id' => MessageStatus::UNVALID,
        ]);
        Flux::toast(__('admin.messages.toast.update.success'), variant: 'success');
        Cache::forget("unread_messages_{$this->userConnected->id}");
    }
    public function delete()
    {
        if ($this->newMerchantMessage->delete()) {
            Flux::toast(__('admin.messages.toast.delete.success'), variant: 'success');
            Flux::modal('delete-message')->close();
            $this->redirectRoute('admin.message.index');
        } else {
            Flux::toast(__('admin.messages.toast.delete.error'), variant: 'danger');
        }
    }

    public function mount(NewMerchantMessageModel $newMerchantMessage)
    {
        $this->newMerchantMessage = $newMerchantMessage;
    }

    public function render()
    {
        return view('livewire.admin.admin.new-merchant-message')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.newMerchantMessage').' | Admin');
    }
}
