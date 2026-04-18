<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use Livewire\Component;

class Order extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.order')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.order').' | Admin');

    }
}
