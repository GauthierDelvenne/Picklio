<?php

namespace App\Livewire\Admin\Admin;

use App\Livewire\PicklioComponent;
use Livewire\Component;

class Statistics extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.statistics')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.statistics').' | Admin');
    }
}
