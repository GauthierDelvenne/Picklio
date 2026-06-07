<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\PickupSlot;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $slots = PickupSlot::where('is_active', true)->get();
        $clients = Account::where('role_id', Role::CLIENT)->get();

        foreach ($clients as $client) {
            $slot = $slots->random();
            $pickupDate = $this->nextOccurrence($slot->day_iso);

            $products = Product::whereHas('stock', fn($q) => $q->where('quantity', '>', 0))
                ->inRandomOrder()
                ->limit(rand(1, 4))
                ->get();
            $totalPrice = 0;
            $items = [];

            foreach ($products as $product) {
                $maxQty = min($product->stock->quantity, 5);
                $quantity = rand(1, max(1, $maxQty));
                $totalPrice += $product->price * $quantity;

                $items[] = [
                    'product_id' => $product->id,
                    'account_id' => $client->id,
                    'merchant_id' => $product->account_id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ];
                $order = Order::create([
                    'uuid' => Str::uuid(),
                    'code' => Order::getGenerateCode(),
                    'account_id' => $client->id,
                    'pickup_slot_id' => $slot->id,
                    'pickup_date' => $pickupDate,
                    'order_status_id' => OrderStatus::INWAIT,
                    'total_price' => $totalPrice,
                ]);

                foreach ($items as $item) {
                    OrderItem::updateOrcreate(
                        ['order_id' => $order->id],
                        $item);
                }
            }
        }
    }

    private function nextOccurrence(int $dayIso): string
    {
        $allowed = [Carbon::TUESDAY, Carbon::WEDNESDAY, Carbon::THURSDAY, Carbon::FRIDAY, Carbon::SATURDAY];

        if (!in_array($dayIso, $allowed)) {
            $dayIso = $allowed[array_rand($allowed)];
        }

        $today = now()->dayOfWeekIso;
        $daysUntil = ($dayIso - $today + 7) % 7;
        $daysUntil = $daysUntil === 0 ? 7 : $daysUntil;

        return now()->addDays($daysUntil)->toDateString();
    }
}
