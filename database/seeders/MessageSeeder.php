<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\ContactMessage;
use App\Models\Message;
use App\Models\NewMerchantMessage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PickupSlot;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\SuggestMessage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Account::where('role_id', Role::ADMIN)->first();
        $merchants = Account::where('role_id', Role::MERCHANT)->limit(3)->get();

        SuggestMessage::factory(3)->create([
            'recipient_id' => $admin->id
        ]);
        NewMerchantMessage::factory(3)->create([
            'recipient_id' => $admin->id
        ]);
        ContactMessage::factory(3)->create([
            'recipient_id' => $admin->id
        ]);
        foreach ($merchants as $merchant) {
            ContactMessage::factory(3)->create([
                'recipient_id' => $merchant->id
            ]);
            Message::factory(2)->create([
                'sender_id' => $admin->id,
                'recipient_id' => $merchant->id,
            ]);
            Message::factory(2)->create([
                'sender_id' => $merchant->id,
                'recipient_id' => $admin->id,
            ]);
        }

    }
}
