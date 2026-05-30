<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'slug', 'capacity', 'tax'])]
class ProductCategory extends Model
{
    use HasFactory;

    /**
     * CONSTANTS
     */
    const ARTISAN_BAKERY = 1;

    const LOCAL_BUTCHER_CHARCUTERIE = 2;

    const BELGIAN_CHEESE_DAIRY = 3;

    const SEASONAL_FRUITS_VEGETABLES = 4;

    const FINE_GROCERY_TERROIR = 5;

    const BELGIAN_CRAFT_BEERS = 6;

    const LOCAL_WINES_SPIRITS = 7;

    const BELGIAN_CHOCOLATES = 8;

    const CATERING_TERROIR_CUISINE = 9;

    const LOCAL_ORGANIC_PRODUCERS = 10;

    const ARTISAN_CREATIONS = 11;

    const POTTERY_CERAMICS = 12;

    const HANDMADE_JEWELRY = 13;

    const ARTISAN_SOAPS_COSMETICS = 14;

    const ARTISAN_CANDLES_SCENTS = 15;

    const LOCAL_ART_DECORATION = 16;

    const LOCAL_TEXTILE_SEWING = 17;

    const LOCAL_FASHION_CLOTHING = 18;

    const ARTISAN_SHOES = 19;

    const LOCAL_LEATHER_GOODS = 20;

    const LOCAL_HOME_LINEN = 21;

    const KITCHEN_UTENSILS = 22;

    const FURNITURE_INTERIOR_DECO = 23;

    const NATURAL_ORGANIC_CARE = 24;

    /**
     * RELATIONS
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
