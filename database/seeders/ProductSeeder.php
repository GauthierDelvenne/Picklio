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
        $merchants = Account::where('role_id', Role::MERCHANT)->get();
        foreach ($merchants as $merchant) {
            $products = Product::factory(10)->create([
                'account_id' => $merchant->id,

            ]);

            foreach ($products as $product) {
                $capacity = $product->productCategory->capacity;
                $quantity = rand(1, $capacity);
                $status = $quantity <= $capacity * 0.10 ? Stock::VERYLOW : ($quantity <= $capacity * 0.25 ? Stock::LOW : Stock::GOOD);

                Stock::factory()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'status' => $status,
                ]);
                StockMovement::factory()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'type' => StockMovement::TYPE_NEW,
                ]);
            }
        }

    }
}
