<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['time', 'max_orders', 'day_iso'])]
class PickupSlot extends Model
{
    use HasFactory;

    const TIMECREATEDCART = 1;
    protected $casts = [
        'time' => 'datetime',
    ];

    /**
     * RELATION
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

