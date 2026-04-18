<?php

namespace App\Livewire\admin\client;

use Livewire\Component;

class ClientMessages extends Component
{
    public function render()
    {
        return view('livewire.admin.client.messages')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.messages').' | Client');
    }
}
