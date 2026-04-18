<?php

namespace App\Livewire\admin\client;

use Livewire\Component;

class ClientStocks extends Component
{
    public function render()
    {
        return view('livewire.admin.client.stocks')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.stocks').' | Client');
    }
}
