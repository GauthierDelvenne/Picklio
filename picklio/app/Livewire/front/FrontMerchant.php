<?php

namespace App\Livewire\front;
use App\Livewire\PicklioComponent;

class FrontMerchant extends PicklioComponent
{
    public function render()
    {
        return view('livewire.front.merchant')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.merchant').' | Picklio');
    }
}
