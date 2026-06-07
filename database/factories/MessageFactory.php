<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\MessageStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(20),
            'description' => $this->faker->realText(200),
            'message_status_id' => rand(MessageStatus::VALID,MessageStatus::UNREAD),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
