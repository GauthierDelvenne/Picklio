<?php

namespace App\Livewire\admin\admin;


use App\Livewire\PicklioComponent;

class Dashboard extends PicklioComponent
{
    public function render()
    {
        return view('livewire.admin.admin.dashboard')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.dashboard').' | Admin');
    }
}
