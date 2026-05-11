<?php

namespace Database\Factories;

use App\Models\SuggestMessage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SuggestMessageFactory extends Factory
{
    protected $model = SuggestMessage::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
