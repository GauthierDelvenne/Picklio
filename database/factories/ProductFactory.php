<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'product_category_id' => $this->faker->numberBetween(1, 22),
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->numberBetween(100, 2000),
            'is_active' => true,
            'picture_path' => 'images/missing-product.webp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
