<?php

namespace App\Livewire\Admin\Client;

use Livewire\Component;

class ClientStatistics extends Component
{
    public function render()
    {
        return view('livewire.admin.client.statistics')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.statistics').' | Client');
    }
}
