<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use Livewire\Component;

class Stock extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.stock')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.stock').' | Admin');
    }
}
