<?php

namespace App\Livewire\admin\client;

use Livewire\Component;

class ClientStock extends Component
{
    public function render()
    {
        return view('livewire.admin.client.stock')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.stock').' | Client');
    }
}
