<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;
use App\Models\Product;
use Livewire\Attributes\Computed;

class Home extends PicklioComponent
{
    #[Computed]
    public function products()
    {
        return Product::with([
            'stock',
            'productCategory',
        ])->limit(6)->get();
    }

    public function render()
    {
        return view('livewire.front.home')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.home').' | Picklio');
    }
}
