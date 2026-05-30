<?php

namespace App\Livewire\Front;

use App\Livewire\PicklioComponent;
use App\Models\Order;
use Livewire\Attributes\Computed;

class FrontOrders extends PicklioComponent
{
    public $account;

    public function mount(): void
    {
        $this->account = $this->userConnected->account;
    }

    #[Computed]
    public function orders()
    {
        return Order::with(['orderItems', 'orderItems.product.stock', 'orderItems.product.productCategory'])
            ->where('account_id', $this->account->id)
            ->orderBy('pickup_date', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.front.orders')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.order').' | Picklio');
    }
}
