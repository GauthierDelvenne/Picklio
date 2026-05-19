<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class Basket extends PicklioComponent
{
    public $cart;

    #[Computed]
    public function orderItems()
    {
        if (!empty($this->userConnected)) {
            $this->cart = Order::with(['orderItems', 'orderItems.product'])
                ->where('account_id', $this->userConnected->account->id)
                ->where('status', Order::INITCART)
                ->first();
            if (!empty($this->cart)) {
                foreach ($this->cart->orderItems as $orderItem) {
                    if ($orderItem->quantity == 0) {
                        $orderItem->delete();
                    }
                }
            } else {
                return [];
            }
            if ($this->cart->orderItems->isEmpty()) {
                $this->cart->delete();

                return [];
            }

            return $this->cart->orderItems;
        } else {
            return [];
        }
    }

    public function delete($orderItemId)
    {
        $orderItem = OrderItem::findOrFail($orderItemId);
        if ($orderItem->delete()) {
            $cart = Order::where('account_id', $this->userConnected->account->id)
                ->where('status', Order::INITCART)
                ->first();

            if ($cart) {
                $cart->total_price = $cart->orderItems()->sum(DB::raw('price'));
                $cart->save();
            }
            unset($this->orderItems);
            $this->dispatch('delete-order');
        }
    }

    #[Computed]
    public function priceHTVA()
    {
        $tvaAmounts = [
            'htva' => 0,
            'tva' => 0,
        ];
        foreach ($this->orderItems as $id => $orderItem) {
            $tvaAmounts['htva'] += round($orderItem->price / (1 + $orderItem->product->productCategory->tax / 100), 2);
            $tvaAmounts['tva'] += round($orderItem->price - ($orderItem->price / (1 + $orderItem->product->productCategory->tax / 100)), 2);

        }
        $tvaAmounts['htva'] =  number_format($tvaAmounts['htva'] / 100, 2, ',', ' ') . ' €';
        $tvaAmounts['tva'] =  number_format($tvaAmounts['tva'] / 100, 2, ',', ' ') . ' €';
        return $tvaAmounts;
    }

    #[On('edit-product')]
    public function resetTotalPrice()
    {
        unset($this->orderItems);
    }

    public function render()
    {
        return view('livewire.front.basket')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.basket') . ' | Picklio');
    }


}
