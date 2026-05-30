<?php

namespace App\Livewire\Front;

use App\Livewire\PicklioComponent;
use App\Models\Order;
use Livewire\Attributes\Computed;

class OrderConfirmation extends PicklioComponent
{
    public Order $order;
    public $orderItems;

    public function mount(Order $order): void
    {
        $this->order = $order;
        $this->orderItems = $this->order->orderItems;
    }

    public function render()
    {
        return view('livewire.front.order-confirmation')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.order-confirmation') . ' | Picklio');
    }
}
