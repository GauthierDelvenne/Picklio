<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;

class Catalogues extends PicklioComponent
{
    public function render()
    {
        return view('livewire.front.catalogue')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.catalogue').' | Picklio');
    }
}
