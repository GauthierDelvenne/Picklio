<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['status'])]
class OrderStatus extends Model
{
    use HasFactory;
    const INIT = 0;

    const INWAIT = 1;

    const FINISH = 2;
    /**
     * RELATION
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
