<?php

namespace App\Livewire\admin\client;

use Livewire\Component;

class ClientMessage extends Component
{
    public function render()
    {
        return view('livewire.admin.client.message')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.message').' | Client');
    }
}
