<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;

class Basket extends PicklioComponent
{
    public function render()
    {
        return view('livewire.front.basket')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.basket').' | Picklio');
    }
}
