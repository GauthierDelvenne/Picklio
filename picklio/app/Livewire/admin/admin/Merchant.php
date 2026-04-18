<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;

class Merchant extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.merchant')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.merchant').' | Admin');
    }
}
