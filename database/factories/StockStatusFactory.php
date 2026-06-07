<?php

namespace Database\Factories;

use App\Models\StockStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StockStatusFactory extends Factory
{
    protected $model = StockStatus::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
