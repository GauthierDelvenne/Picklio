<?php

namespace Database\Factories;

use App\Models\NewMerchantMessage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class NewMerchantMessageFactory extends Factory
{
    protected $model = NewMerchantMessage::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
