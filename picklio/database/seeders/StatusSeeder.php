<?php

namespace Database\Seeders;

use App\Models\MessageStatus;
use App\Models\Role;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::factory()->createMany([
            ['status' => 'active'],
            ['status' => 'in_wait'],
            ['status' => 'inactive'],
        ]);
        MessageStatus::factory()->createMany([
            ['status' => 'valid'],
            ['status' => 'unread'],
            ['status' => 'unvalid'],
        ]);
    }
}
