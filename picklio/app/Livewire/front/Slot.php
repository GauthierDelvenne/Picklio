<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;

class Slot extends PicklioComponent
{
    public function render()
    {
        return view('livewire.front.slot')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.slot').' | Picklio');
    }
}
