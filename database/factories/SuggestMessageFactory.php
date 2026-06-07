<?php

namespace Database\Factories;

use App\Models\MessageStatus;
use App\Models\SuggestMessage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SuggestMessageFactory extends Factory
{
    protected $model = SuggestMessage::class;

    public function definition(): array
    {
        $firstname = $this->faker->firstName();
        $lastname = $this->faker->lastName();
        return [
            'name' => $firstname.' '.$lastname,
            'email' => $firstname.$lastname.'@exemple.be',
            'merchantSuggest' => $this->faker->realText(200),
            'productSuggest' => $this->faker->realText(200),
            'message_status_id' => MessageStatus::UNREAD,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
