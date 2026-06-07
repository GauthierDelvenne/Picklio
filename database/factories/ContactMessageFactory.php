<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use App\Models\MessageStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContactMessageFactory extends Factory
{
    protected $model = ContactMessage::class;

    public function definition(): array
    {
         $firstname = $this->faker->firstName();
         $lastname = $this->faker->lastName();
        return [
            'name' => $firstname.' '.$lastname,
            'email' => $firstname.$lastname.'@exemple.be',
            'phone' => $this->faker->phoneNumber,
            'title' => $this->faker->realText(20),
            'description' => $this->faker->realText(200),
            'message_status_id' => MessageStatus::UNREAD,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
