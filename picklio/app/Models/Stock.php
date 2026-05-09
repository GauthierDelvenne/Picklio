<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['product_id', 'quantity'])]
class Stock extends Model
{
    use HasFactory;

    /**
     * RELATIONS
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function movements(): HasMany
    {
        return $this->hasMany(StockMovement::class, 'product_id', 'product_id');
    }

    /**
     * ACCESSORS
     */
    public function isLowStock(int $capacity): bool
    {
        return $this->quantity <= $capacity * 0.25;
    }

    public function isVeryLowStock(int $capacity): bool
    {
        return $this->quantity <= $capacity * 0.10;
    }
}
