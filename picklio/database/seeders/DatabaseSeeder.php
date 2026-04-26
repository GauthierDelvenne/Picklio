<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Role;
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

        $user = User::factory()->create([
            'name' => 'Delvenne Gauthier',
            'email' => 'gauthierdelvenne@gmail.com',
        ]);
        Account::factory()->create([
            'user_id' => $user->id,
            'role_id' => Role::ADMIN,
            'firstname' => 'gauthier',
            'lastname' => 'delvenne',
            'email' => 'gauthierdelvenne@gmail.com',
            'phone' => '0497546943',
        ]);
    }
}
