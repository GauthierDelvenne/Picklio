<?php

namespace Database\Seeders;

use App\Models\MessageStatus;
use App\Models\OrderStatus;
use App\Models\Role;
use App\Models\Status;
use App\Models\StockMovementType;
use App\Models\StockStatus;
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
        OrderStatus::factory()->createMany([
            ['status' => 'init'],
            ['status' => 'in_wait'],
            ['status' => 'finish'],
        ]);
        StockStatus::factory()->createMany([
            ['status' => 'good'],
            ['status' => 'low'],
            ['status' => 'very_low'],
        ]);
        StockMovementType::factory()->createMany([
            ['type' => 'new'],
            ['type' => 'supply'],
            ['type' => 'sale'],
            ['type' => 'adjustment'],
        ]);
    }
}
