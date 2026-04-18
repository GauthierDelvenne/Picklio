<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;

class Catalogue extends PicklioComponent
{
    public function render()
    {
        return view('livewire.front.product')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.product').' | Picklio');
    }
}
