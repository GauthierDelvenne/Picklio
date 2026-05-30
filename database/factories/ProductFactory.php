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
            'product_category_id' => fake()->numberBetween(1, 24),
            'name' => fake()->words(3, true),
            'description' => fake()->sentence(12),
            'price' => fake()->numberBetween(100, 2000),
            'percentage' => null,
            'is_active' => true,
            'picture_path' => 'images/missing-product.webp',
            'start_at' => null,
            'end_at' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
