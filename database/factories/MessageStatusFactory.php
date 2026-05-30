<?php

namespace Database\Factories;

use App\Models\MessageStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MessageStatusFactory extends Factory
{
    protected $model = MessageStatus::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
