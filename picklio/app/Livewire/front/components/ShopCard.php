<?php

namespace App\Livewire\front\components;

use App\Livewire\PicklioComponent;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PickupSlot;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ShopCard extends PicklioComponent
{
    public $price;

    public $account;

    public $productId;

    public $product;

    public $card;

    public $basket = false;

    public $quantity = 0;

    public $capacity;

    public $stockAvailable;

    public function mount($price, $productId, $card): void
    {
        $this->price = $price;
        $this->productId = $productId;
        $this->card = $card;
        $this->product = Product::with(['productCategory', 'stock'])
            ->findOrFail($this->productId);
        $this->capacity = $this->product->productCategory->capacity;
        $this->stockAvailable = $this->product->stock->quantity;
        if (! empty($this->userConnected)) {
            $this->account = $this->userConnected->account;

        }
    }

    public function addToCart()
    {
        if (empty($this->userConnected)) {
            return redirect()->route('auth.login');
        }
        if ($this->quantity <= 0) {
            return false;
        }
        DB::transaction(function () {
            $cart = Order::firstOrCreate(
                ['account_id' => $this->account->id, 'status' => Order::INITCART],
                ['total_price' => 0, 'pickup_slot_id' => PickupSlot::TIMECREATEDCART]
            );
            $item = OrderItem::thisProductItem($cart->id, $this->productId)->first();
            if ($item) {
                $item->increment('quantity', $this->quantity);
                if ($item->quantity > $this->stockAvailable) {
                    $item->quantity = $this->stockAvailable;
                    $item->save();
                    $this->dispatch('max-product');
                }
            } else {
                OrderItem::create([
                    'order_id' => $cart->id,
                    'product_id' => $this->productId,
                    'account_id' => $this->account->id,
                    'merchant_id' => $this->product->account_id,
                    'quantity' => $this->quantity,
                    'price' => $this->product->price * $this->quantity,
                ]);
            }
            $cart->total_price = $cart->orderItems()->sum(DB::raw('price'));
            $cart->save();
        });
        $this->dispatch('add-product');
    }

    public function increment()
    {
        if ($this->quantity < $this->stockAvailable) {
            $this->quantity++;

            $result = $this->isAccountCart();
            if ($result) {
                $result->quantity++;
                if ($result->quantity > $this->stockAvailable) {
                    $result->quantity = $this->stockAvailable;
                    $this->dispatch('max-product');
                }
                $result->price = $result->priceQuantity;
                $this->price = $result->priceformatted;
                $result->save();
            }
            $this->recalculateCartTotal();
            $this->dispatch('edit-product');

        }
    }

    public function isAccountCart()
    {
        if (! empty($this->account)) {
            $cart = Order::orderCart($this->account->id)->first();
            if (! empty($cart)) {
                return OrderItem::thisProductItem($cart->id, $this->productId)->first();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updatedQuantity()
    {
        if ($this->quantity > $this->stockAvailable) {
            $this->quantity = $this->stockAvailable;
        }
        $result = $this->isAccountCart();
        if ($result) {
            $result->quantity = $this->quantity;
            $result->price = $result->priceQuantity;
            $this->price = $result->priceformatted;
            $result->save();
        }
        $this->recalculateCartTotal();
        $this->dispatch('edit-product');

    }

    public function decrement()
    {
        if ($this->quantity > 0) {
            $this->quantity--;
            $result = $this->isAccountCart();
            if ($result) {
                $result->quantity--;
                $result->price = $result->priceQuantity;
                $this->price = $result->priceformatted;
                $result->save();
            }
            $this->recalculateCartTotal();
            $this->dispatch('edit-product');
        }
    }

    public function recalculateCartTotal(): void
    {
        if (! empty($this->account)) {
            $cart = Order::orderCart($this->account->id)->first();
            if ($cart) {
                $cart->total_price = $cart->orderItems()
                    ->sum(DB::raw('price'));
                $cart->save();
            }
        }
    }

    public function render(): View
    {
        return view('components.front.shopCard');
    }
}
