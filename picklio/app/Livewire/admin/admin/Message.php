<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use Livewire\Component;

class Message extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.message')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.message').' | Admin');
    }
}
