<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use Livewire\Component;

class Stocks extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.stocks')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.stocks').' | Admin');
    }
}
