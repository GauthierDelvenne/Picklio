<?php

namespace Database\Seeders;

use App\Models\PickupSlot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PickupSlotSeeder extends Seeder
{
    public function run(): void
    {
        PickupSlot::factory()->create([
            'time' => Carbon::today()->setTime(0, 0)->format('H:i'),
            'max_orders' => 1000,
        ]);

        $start = Carbon::today()->setTime(10, 0);
        $end = Carbon::today()->setTime(20, 0);

        $current = $start->copy();

        while ($current->lessThan($end)) {
            PickupSlot::factory()->create([
                'time' => $current->format('H:i'),
            ]);

            $current->addMinutes(30);
        }
    }
}
