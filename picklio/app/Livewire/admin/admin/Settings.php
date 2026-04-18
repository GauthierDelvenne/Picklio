<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use Livewire\Component;

class Settings extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.settings')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.settings') . ' | Admin');
    }
}
