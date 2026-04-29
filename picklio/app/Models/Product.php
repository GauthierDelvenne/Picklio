<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['account_id', 'product_category_id', 'product_price_id', 'name', 'description', 'price', 'percentage', 'start_at', 'end_at', 'picture_path', 'is_active', 'id'])]
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
        return number_format($this->price / 100, 2, ',', ' ').' €';
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

        return asset('storage/'.$variantPath.'/'.$fileName);
    }

    /**
     * SCOPE
     */
    public function scopeWhereAccount(Builder $query, $accountID): Builder
    {
        return $query->where('account_id', $accountID);
    }
}
