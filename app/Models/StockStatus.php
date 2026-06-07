<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['status'])]
class StockStatus extends Model
{
    use HasFactory;
    const GOOD = 1;

    const LOW = 2;

    const VERYLOW = 3;
    /**
     * RELATION
     */
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
