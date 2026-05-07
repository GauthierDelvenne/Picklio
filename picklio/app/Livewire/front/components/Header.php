<?php

namespace App\Livewire\front\components;

use App\Livewire\PicklioComponent;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class Header extends PicklioComponent
{
    public function render(): View
    {
        return view('partials.front.header');
    }
}
