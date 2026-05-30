<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\PickupSlot;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use App\Models\Warehouse;
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
            'name' => 'Ad Min',
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
            'name' => 'Mer Chant',
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
            'address' => 'Rue de liège 2,',
            'postal_code' => '4000',
            'country' => 'BE',
        ]);
        // WAREHOUSE
        $userC = User::factory()->create([
            'name' => 'Ware House',
            'email' => 'warhouse@gmail.com',
        ]);
        Account::factory()->create([
            'user_id' => $userC->id,
            'role_id' => Role::WAREHOUSE,
            'firstname' => 'Ware',
            'lastname' => 'House',
            'email' => 'warehouse@gmail.com',
            'phone' => '0497444444',
        ]);
        Warehouse::factory()->create([
            'name' => 'Picklio',
            'phone' => '04 97 54 69 43',
            'email' => 'picklio@gmail.com',
            'address' => 'Rue de liège 2,',
            'postal_code' => '4000',
            'country' => 'BE',
            'opening_time' => '10:00',
            'closing_time' => '20:00',
        ]);
        User::factory(9)
            ->create()
            ->each(function (User $user) {
                Account::factory()->create([
                    'user_id' => $user->id,
                    'role_id' => Role::MERCHANT,
                    'status_id' => Status::ACTIVE,
                    'email' => $user->email,
                ]);
            });

        // CLIENT
        $userD = User::factory()->create([
            'name' => 'Gauthier Delvenne',
            'email' => 'gauthierdelvenne@gmail.com',
        ]);
        Account::factory()->create([
            'user_id' => $userD->id,
            'role_id' => Role::CLIENT,
            'firstname' => 'Gauthier',
            'lastname' => 'Delvenne',
            'email' => 'gauthierdelvenne@gmail.com',
            'phone' => '0497324444',
        ]);
        $this->call(ProductSeeder::class);
        $this->call(PickupSlotSeeder::class);
    }
}
