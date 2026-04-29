<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(ProductCategorySeeder::class);

// ADMIN
        $userA = User::factory()->create([
            'name' => 'ADMIN',
            'email' => 'admin@gmail.com',
        ]);
        Account::factory()->create([
            'user_id' => $userA->id,
            'role_id' => Role::ADMIN,
            'firstname' => 'Ad',
            'lastname' => 'Min',
            'email' => 'admin@gmail.com',
            'phone' => '0497444444',
        ]);

// MERCHANT
        $userC = User::factory()->create([
            'name' => 'MERCHANT',
            'email' => 'merchant@gmail.com',
        ]);
        Account::factory()->create([
            'user_id' => $userC->id,
            'role_id' => Role::MERCHANT,
            'status_id' => Status::ACTIVE,
            'firstname' => 'Mer',
            'lastname' => 'Chant',
            'email' => 'merchant@gmail.com',
            'phone' => '0497444445',
        ]);
    }
}
