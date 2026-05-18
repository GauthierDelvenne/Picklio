<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Artisan Bakery',                     'capacity' => 50,  'tax' => 6],
            ['name' => 'Local Butcher & Charcuterie',        'capacity' => 30,  'tax' => 6],
            ['name' => 'Belgian Cheese & Dairy Products',    'capacity' => 30,  'tax' => 6],
            ['name' => 'Seasonal Fruits & Vegetables',       'capacity' => 100, 'tax' => 6],
            ['name' => 'Fine Grocery & Belgian Terroir',     'capacity' => 75,  'tax' => 6],
            ['name' => 'Belgian Chocolates & Confectionery', 'capacity' => 75,  'tax' => 6],
            ['name' => 'Local Organic Producers',            'capacity' => 75,  'tax' => 6],
            ['name' => 'Catering & Terroir Cuisine',         'capacity' => 20,  'tax' => 6],

            ['name' => 'Belgian Craft Beers',                'capacity' => 200, 'tax' => 21],
            ['name' => 'Local Wines & Spirits',              'capacity' => 100, 'tax' => 21],

            ['name' => 'Artisan Creations',                  'capacity' => 20,  'tax' => 21],
            ['name' => 'Pottery & Ceramics',                 'capacity' => 15,  'tax' => 21],
            ['name' => 'Handmade Jewelry & Accessories',     'capacity' => 25,  'tax' => 21],
            ['name' => 'Artisan Soaps & Cosmetics',          'capacity' => 50,  'tax' => 21],
            ['name' => 'Artisan Candles & Scents',           'capacity' => 40,  'tax' => 21],
            ['name' => 'Local Art & Decoration',             'capacity' => 15,  'tax' => 21],
            ['name' => 'Local Textile & Sewing',             'capacity' => 30,  'tax' => 21],

            ['name' => 'Local Fashion & Clothing',           'capacity' => 50,  'tax' => 21],
            ['name' => 'Artisan Shoes',                      'capacity' => 30,  'tax' => 21],
            ['name' => 'Local Leather Goods',                'capacity' => 25,  'tax' => 21],

            ['name' => 'Local Home Linen',                   'capacity' => 40,  'tax' => 21],
            ['name' => 'Kitchen Utensils',                   'capacity' => 50,  'tax' => 21],
            ['name' => 'Furniture & Interior Decoration',    'capacity' => 10,  'tax' => 21],

            ['name' => 'Natural & Organic Care',             'capacity' => 60,  'tax' => 21],
        ];

        foreach ($categories as $category) {
            ProductCategory::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'capacity' => $category['capacity'],
                'tax' => $category['tax'],
            ]);
        }
    }
}
