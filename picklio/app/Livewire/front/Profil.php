<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;

class Profil extends PicklioComponent
{
    public function render()
    {
        return view('livewire.front.profil')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.profil').' | Picklio');
    }
}
