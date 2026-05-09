<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Product;
use App\Models\Role;
use App\Models\Stock;
use App\Models\StockMovement;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchant = Account::where('role_id', Role::MERCHANT)->first();
        $products = Product::factory(10)->create([
            'account_id' => $merchant->id,
        ]);

        foreach ($products as $product) {
            Stock::factory()->create([
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
            StockMovement::factory()->create([
                'product_id' => $product->id,
                'quantity' => 1,
                'type' => StockMovement::TYPE_NEW,
            ]);
        }
    }
}
