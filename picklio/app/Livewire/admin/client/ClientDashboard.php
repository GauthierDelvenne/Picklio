<?php

namespace App\Livewire\admin\client;

use Livewire\Component;

class ClientDashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.client.dashboard')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.dashboard').' | Client');
    }
}
