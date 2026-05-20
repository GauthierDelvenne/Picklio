<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['account_id', 'pickup_slot_id', 'status', 'total_price', 'pickup_date', 'uuid', 'id'])]
class Order extends Model
{
    use HasFactory;

    const INITCART = 0;
    const INWAITCART = 1;
    const FINISHCART = 2;

    /**
     * RELATIONS
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function pickupSlot(): BelongsTo
    {
        return $this->belongsTo(PickupSlot::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * ACCESSORS
     */
    public function getPriceFormattedAttribute(): string
    {
        return number_format($this->total_price / 100, 2, ',', ' ').' €';
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * SCOPE
     */
    public function scopeOrderCart(Builder $query, $accountId): Builder
    {
        return $query->where('account_id', $accountId)->where('status', 0);
    }
}
