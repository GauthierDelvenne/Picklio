<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;

class OrderConfirmation extends PicklioComponent
{
    public function render()
    {
        return view('livewire.front.order-confirmation')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.order-confirmation').' | Picklio');
    }
}
