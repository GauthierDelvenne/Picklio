<?php

namespace App\Livewire\Front\Components;

use App\Livewire\PicklioComponent;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;

class Header extends PicklioComponent
{
    public $is_admin = false;

    public $is_merchant = false;

    public function mount()
    {
        if (!empty($this->userConnected)) {
            if ($this->userConnected->account->role_id == Role::ADMIN || $this->userConnected->account->role_id == Role::WAREHOUSE) {
                $this->is_admin = true;
            }
            if ($this->userConnected->account->role_id == Role::MERCHANT) {
                $this->is_merchant = true;
            }
        }
    }

    #[Computed]
    public function cartProductNumber()
    {
        if (!empty($this->userConnected)) {
            $order = $this->getCartByAccount($this->userConnected->account->id);
            if (!empty($order)) {
                return OrderItem::where('order_id', $order->id)
                    ->count();
            } else {
                return null;
            }
        }

        return null;
    }

    public function render(): View
    {
        return view('partials.front.header');
    }
}
