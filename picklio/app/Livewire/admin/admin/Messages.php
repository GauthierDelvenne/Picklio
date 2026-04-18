<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use Livewire\Component;

class Messages extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.messages')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.messages').' | Admin');
    }
}
