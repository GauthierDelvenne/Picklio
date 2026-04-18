<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;

class Home extends PicklioComponent
{
    public function render()
    {
        return view('livewire.front.home')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.home').' | Picklio');
    }
}
