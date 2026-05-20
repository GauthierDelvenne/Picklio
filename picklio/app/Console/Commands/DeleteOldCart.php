<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class DeleteOldCart extends Command
{
    protected $signature = 'cart:delete-old';
    protected $description = 'Supprime les paniers abandonnés';

    public function handle()
    {
        $carts = Order::where('updated_at', '<', Carbon::now()->subHours(5))
            ->where('status', Order::INITCART)
            ->with('orderItems.product.stock')
            ->get();
        foreach ($carts as $cart) {
            foreach ($cart->orderItems as $item) {
                $item->product->stock->decrement('quantity_reserved', $item->quantity);
            }
            $cart->orderItems()->delete();
            $cart->delete();
        }
    }
}
