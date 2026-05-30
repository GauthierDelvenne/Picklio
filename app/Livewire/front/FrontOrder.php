<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;
use App\Models\Order;

class FrontOrder extends PicklioComponent
{
    public $order;

    public $orderItems;

    public function mount(Order $order): void
    {
        $this->order = $order;
        $this->orderItems = $order->orderItems;
    }



    public function render()
    {
        return view('livewire.front.order')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.order') . ' | Picklio');
    }
}
