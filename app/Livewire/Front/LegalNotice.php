<?php

namespace App\Livewire\Front;

use App\Livewire\PicklioComponent;

class LegalNotice extends PicklioComponent
{

    public function render()
    {
        return view('livewire.front.legal-notice')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.legal-notice').' | Picklio');
    }
}
