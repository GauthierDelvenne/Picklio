<?php

namespace Database\Factories;

use App\Models\MessageStatus;
use App\Models\NewMerchantMessage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class NewMerchantMessageFactory extends Factory
{
    protected $model = NewMerchantMessage::class;

    public function definition(): array
    {
        $firstname = $this->faker->firstName();
        $lastname = $this->faker->lastName();
        return [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'name' => $this->faker->domainName,
            'email' => $firstname.$lastname.'@exemple.be',
            'description' => $this->faker->realText(200),
            'address' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'country' => 'BE',
            'message_status_id' => MessageStatus::UNREAD,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
