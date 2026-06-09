<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['type'])]
class StockMovementType extends Model
{
    use HasFactory;

    const TYPE_SUPPLY = 1;

    const TYPE_SALE = 2;

    const TYPE_ADJUSTMENT = 3;


    /**
     * RELATION
     */
    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
}
