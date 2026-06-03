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
    const BELGIAN_CRAFT_BEERS = 1;

    const HANDMADE_JEWELRY = 2;

    const LOCAL_BUTCHER_CHARCUTERIE = 3;

    const ARTISAN_CANDLES_SCENTS = 4;

    const ARTISAN_BAKERY = 5;

    const ARTISAN_SHOES = 6;

    const BELGIAN_CHOCOLATES = 7;

    const ARTISAN_CREATIONS = 8;

    const LOCAL_ART_DECORATION = 9;

    const FINE_GROCERY_TERROIR = 10;

    const BELGIAN_CHEESE_DAIRY = 11;

    const SEASONAL_FRUITS_VEGETABLES = 12;

    const LOCAL_HOME_LINEN = 13;

    const LOCAL_LEATHER_GOODS = 14;

    const FURNITURE_INTERIOR_DECO = 15;

    const POTTERY_CERAMICS = 16;

    const ARTISAN_SOAPS_COSMETICS = 17;

    const LOCAL_TEXTILE_SEWING = 18;

    const CATERING_TERROIR_CUISINE = 19;

    const KITCHEN_UTENSILS = 20;

    const LOCAL_FASHION_CLOTHING = 21;

    const LOCAL_WINES_SPIRITS = 22;

    /**
     * RELATIONS
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
