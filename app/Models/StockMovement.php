<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['product_id', 'quantity', 'stock_movement_type_id'])]
class StockMovement extends Model
{
    use HasFactory;

    /**
     * RELATIONS
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * ACCESSORS
     */
    public function getIsEntryAttribute(): bool
    {
        return $this->quantity > 0;
    }

    public function getIsExitAttribute(): bool
    {
        return $this->quantity < 0;
    }
}
