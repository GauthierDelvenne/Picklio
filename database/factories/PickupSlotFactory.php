<?php

namespace Database\Factories;

use App\Models\PickupSlot;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PickupSlotFactory extends Factory
{
    protected $model = PickupSlot::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
