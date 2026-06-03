<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

#[Fillable(['account_id', 'product_category_id', 'name', 'description', 'price', 'picture_path', 'is_active', 'id'])]
class Product extends Model
{
    use HasFactory;

    /**
     * RELATIONS
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function stock(): HasOne
    {
        return $this->hasOne(Stock::class);
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }

    /**
     * ACCESSORS
     */
    public function getPriceFormattedAttribute(): string
    {
        return number_format($this->price / 100, 2, ',', ' ') . ' €';
    }

    public function getPriceFormattedWithoutSymbolAttribute(): string
    {
        return number_format($this->price / 100, 2, ',', ' ');
    }

    public function pictureUrl(int $size = 600): string
    {
        $variantPath = sprintf(
            config('pickliopicture.variantPath'),
            $this->account_id,
            $size
        );

        $fileName = basename($this->picture_path);

        return Storage::disk('s3')->url($variantPath . '/' . $fileName);
    }

    /**
     * SCOPE
     */
    public function scopeWhereAccount(Builder $query, $accountID): Builder
    {
        return $query->where('account_id', $accountID);
    }

    public function scopeVeryLowStock(Builder $query): Builder
    {
        return $query->whereRelation('stock', 'status', Stock::VERYLOW);
    }

    public function scopeLowStock(Builder $query): Builder
    {
        return $query->whereRelation('stock', 'status', Stock::LOW);
    }
    public function scopeLowOrVeryLowStock(Builder $query): Builder
    {
        return $query->whereRelation('stock', function (Builder $query) {
            $query->whereIn('status', [Stock::LOW, Stock::VERYLOW]);
        });
    }
    public function scopeAlimentaryProduct(Builder $query): Builder
    {
        return $query->whereIn('product_category_id', [
            ProductCategory::ARTISAN_BAKERY,
            ProductCategory::LOCAL_BUTCHER_CHARCUTERIE,
            ProductCategory::BELGIAN_CHEESE_DAIRY,
            ProductCategory::SEASONAL_FRUITS_VEGETABLES,
            ProductCategory::FINE_GROCERY_TERROIR,
            ProductCategory::BELGIAN_CRAFT_BEERS,
            ProductCategory::LOCAL_WINES_SPIRITS,
            ProductCategory::BELGIAN_CHOCOLATES,
            ProductCategory::CATERING_TERROIR_CUISINE,
        ]);
    }

    public function scopeNoAlimentaryProduct(Builder $query): Builder
    {
        return $query->whereIn('product_category_id', [
            ProductCategory::ARTISAN_CREATIONS,
            ProductCategory::POTTERY_CERAMICS,
            ProductCategory::HANDMADE_JEWELRY,
            ProductCategory::ARTISAN_SOAPS_COSMETICS,
            ProductCategory::ARTISAN_CANDLES_SCENTS,
            ProductCategory::LOCAL_ART_DECORATION,
            ProductCategory::LOCAL_TEXTILE_SEWING,
            ProductCategory::LOCAL_FASHION_CLOTHING,
            ProductCategory::ARTISAN_SHOES,
            ProductCategory::LOCAL_LEATHER_GOODS,
            ProductCategory::LOCAL_HOME_LINEN,
            ProductCategory::KITCHEN_UTENSILS,
            ProductCategory::FURNITURE_INTERIOR_DECO,
        ]);
    }
}
