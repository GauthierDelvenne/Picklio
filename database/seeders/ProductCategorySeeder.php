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
            ['name' => 'Bières artisanales',                      'capacity' => 200, 'tax' => 21],
            ['name' => 'Bijoux & Accessoires faits main',         'capacity' => 25,  'tax' => 21],
            ['name' => 'Boucherie & Charcuterie',                 'capacity' => 30,  'tax' => 6],
            ['name' => 'Bougies & Senteurs artisanales',          'capacity' => 40,  'tax' => 21],
            ['name' => 'Boulangerie artisanale',                  'capacity' => 50,  'tax' => 6],
            ['name' => 'Chaussures artisanales',                  'capacity' => 30,  'tax' => 21],
            ['name' => 'Chocolats & Confiseries',                 'capacity' => 75,  'tax' => 6],
            ['name' => 'Créations artisanales',                   'capacity' => 20,  'tax' => 21],
            ['name' => 'Décoration & Art',                        'capacity' => 15,  'tax' => 21],
            ['name' => 'Épicerie fine',                           'capacity' => 75,  'tax' => 6],
            ['name' => 'Fromages & Produits laitiers',            'capacity' => 30,  'tax' => 6],
            ['name' => 'Fruits & Légumes de saison',              'capacity' => 100, 'tax' => 6],
            ['name' => 'Linge de maison',                         'capacity' => 40,  'tax' => 21],
            ['name' => 'Maroquinerie',                            'capacity' => 25,  'tax' => 21],
            ['name' => 'Mobilier & Décoration intérieure',        'capacity' => 10,  'tax' => 21],
            ['name' => 'Poterie & Céramique',                     'capacity' => 15,  'tax' => 21],
            ['name' => 'Savons & Cosmétiques artisanaux',         'capacity' => 50,  'tax' => 21],
            ['name' => 'Textile & Couture',                       'capacity' => 30,  'tax' => 21],
            ['name' => 'Traiteur & Cuisine',                      'capacity' => 20,  'tax' => 6],
            ['name' => 'Ustensiles & Cuisine',                    'capacity' => 50,  'tax' => 21],
            ['name' => 'Vêtements & Mode',                        'capacity' => 50,  'tax' => 21],
            ['name' => 'Vins & Spiritueux',                       'capacity' => 100, 'tax' => 21],
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
