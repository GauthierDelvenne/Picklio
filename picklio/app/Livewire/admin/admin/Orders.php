<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use Livewire\Component;

class Orders extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.orders')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.orders').' | Admin');
    }
}
