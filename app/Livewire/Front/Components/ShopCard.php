<?php

namespace App\Livewire\Front\Components;

use App\Livewire\PicklioComponent;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PickupSlot;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShopCard extends PicklioComponent
{
    public $price;

    public $account;

    public $productId;

    public Product $product;

    public $card;

    public $basket = false;

    public $quantity = 0;

    public $capacity;
    public $cartItem;
    public $stockAvailable;

    public function mount($price, Product $product, $card, $cartItem = null): void
    {
        $this->price = $price;
        $this->productId = $product->id;
        $this->card = $card;
        $this->product = $product;
        $this->capacity = $product->productCategory->capacity;
        $this->stockAvailable = $product->stock->availableQuantity;
        if (! empty($this->userConnected)) {
            if ($cartItem) {
                $this->quantity = $cartItem->quantity;
                $this->stockAvailable += $cartItem->quantity;
            }
        }
    }

    public function isAccountCart($cart = null)
    {
        if (! empty($this->account)) {
            $cart ??= $this->getCartByAccount($this->account->id);
            if (! empty($cart)) {
                return OrderItem::thisProductItem($cart->id, $this->productId)->first();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function addToCart()
    {
        if (empty($this->account)) {
            return $this->dispatch('register', productId: $this->productId);
        }
        if ($this->quantity <= 0) {
            $this->quantity = 1;
        }
        DB::transaction(function () {
            $cart = Order::firstOrCreate(
                ['account_id' => $this->account->id, 'status' => Order::INITCART],
                ['total_price' => 0, 'code' => Order::getGenerateCode(), 'uuid' => Str::uuid(), 'pickup_date' => now(), 'pickup_slot_id' => PickupSlot::TIMECREATEDCART]
            );
            $item = OrderItem::thisProductItem($cart->id, $this->productId)->first();
            if ($item) {
                $item->increment('quantity', $this->quantity);
                if ($item->quantity > $this->stockAvailable) {
                    $item->quantity = $this->stockAvailable;
                    $item->save();
                    $this->dispatch('max-product');
                }
                $this->product->stock->increment('quantity_reserved', $this->quantity);
            } else {
                OrderItem::create([
                    'order_id' => $cart->id,
                    'product_id' => $this->productId,
                    'account_id' => $this->account->id,
                    'merchant_id' => $this->product->account_id,
                    'quantity' => $this->quantity,
                    'price' => $this->product->price * $this->quantity,
                ]);
                $this->product->stock->increment('quantity_reserved', $this->quantity);
            }
            $cart->total_price = $cart->orderItems()->sum(DB::raw('price'));
            $cart->save();
        });
        $this->dispatch('add-product');
    }

    public function increment()
    {
        if (empty($this->account)) {
            return $this->dispatch('register', productId: $this->productId);
        }
        if ($this->quantity < $this->stockAvailable) {
            $this->quantity++;
            $cart = Order::orderCart($this->account->id)->first();

            $result = $this->isAccountCart($cart);
            if ($result) {
                $result->quantity++;
                if ($result->quantity > $this->stockAvailable) {
                    $result->quantity = $this->stockAvailable;
                    $this->dispatch('max-product');
                }
                $result->price = $result->priceQuantity;
                $this->price = $result->priceformatted;
                $this->product->stock->increment('quantity_reserved', 1);
                $result->save();
            }
            $this->recalculateCartTotal($cart);
            $this->dispatch('edit-product');

        }
    }

    public function recalculateCartTotal($cart): void
    {
        if (! empty($this->account)) {
            if ($cart) {
                $cart->total_price = $cart->orderItems()
                    ->sum(DB::raw('price'));
                $cart->save();
                $this->clearCartCache($this->account->id);
            }
        }
    }

    public function updatedQuantity()
    {
        if (empty($this->account)) {
            return $this->dispatch('register', productId: $this->productId);
        }
        if ($this->quantity > $this->stockAvailable) {
            $this->quantity = $this->stockAvailable;
        }
        $cart = $this->getCartByAccount($this->account->id);
        $result = $this->isAccountCart($cart);
        if ($result) {
            $diff = (int) $this->quantity - (int) $result->quantity;
            $result->quantity = $this->quantity;
            $result->price = $result->priceQuantity;
            $this->price = $result->priceformatted;
            if (empty($this->quantity)) {
                $result->price = 0;
            }
            $result->save();

            if ($diff > 0) {
                $this->product->stock->increment('quantity_reserved', $diff);
            } elseif ($diff < 0) {
                $this->product->stock->increment('quantity_reserved', $diff);
            }
        }
        $this->recalculateCartTotal($cart);
        $this->dispatch('edit-product');

    }

    public function decrement()
    {
        if (empty($this->account)) {
            return $this->dispatch('register', productId: $this->productId);
        }
        if ($this->quantity > 0) {
            $this->quantity--;

            $cart = $this->getCartByAccount($this->account->id);
            $result = $this->isAccountCart($cart);
            if ($result) {
                $result->quantity--;
                $result->price = $result->priceQuantity;
                $this->price = $result->priceformatted;
                if ($this->quantity == 0) {
                    $result->price = 0;
                }
                $this->product->stock->decrement('quantity_reserved', 1);
                $result->save();
            }
            $this->recalculateCartTotal($cart);
            $this->dispatch('edit-product');
        }
    }

    public function render(): View
    {
        return view('components.front.shopCard');
    }
}
