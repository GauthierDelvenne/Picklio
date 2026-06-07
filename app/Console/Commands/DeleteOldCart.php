<?php

namespace App\Console\Commands;

use App\Mail\PreventCartDeleteMail;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Mail;

class DeleteOldCart extends Command
{
    protected $signature = 'cart:delete-old';

    protected $description = 'Supprime les paniers abandonnés';

    public function handle()
    {
        $preventCarts = Order::where('updated_at', '<', Carbon::now()->subMinutes(105))
            ->where('order_status_id', OrderStatus::INIT)
            ->with('orderItems.product.stock')
            ->get();

        foreach ($preventCarts as $preventCart) {
            Mail::to($preventCart->account->email)->send(new PreventCartDeleteMail);

        }
        $carts = Order::where('updated_at', '<', Carbon::now()->subHours(2))
            ->where('order_status_id', OrderStatus::INIT)
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
