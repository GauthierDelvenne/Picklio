<?php

namespace App\Livewire\Front;

use App\Livewire\PicklioComponent;

class PrivacyPolicy extends PicklioComponent
{
    public function render()
    {
        return view('livewire.front.privacy-policy')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.privacy-policy').' | Picklio');
    }
}
