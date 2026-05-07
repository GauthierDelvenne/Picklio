<?php

namespace App\Livewire\front\components;

use App\Livewire\PicklioComponent;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class Footer extends PicklioComponent
{
    public $open;

    public $close;
    public $warehouse;

    public function mount(): void
    {
        $this->warehouse = Warehouse::first();

        $this->open = Carbon::parse($this->warehouse->opening_time)->format('H\hi');
        $this->close = Carbon::parse($this->warehouse->closing_time)->format('H\hi');
    }

    public function render(): View
    {
        return view('partials.front.footer');
    }
}
