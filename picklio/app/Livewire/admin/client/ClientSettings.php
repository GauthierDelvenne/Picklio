<?php

namespace App\Livewire\admin\client;

use Livewire\Component;

class ClientSettings extends Component
{
    public function render()
    {
        return view('livewire.admin.client.settings')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.settings') . ' | Client');
    }
}
