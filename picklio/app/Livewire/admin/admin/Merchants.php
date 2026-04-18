<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;

class Merchants extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.merchants')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.merchants').' | Admin');
    }
}
