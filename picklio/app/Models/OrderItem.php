<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['order_id', 'product_id', 'account_id', 'quantity', 'price', 'merchant_id'])]
class OrderItem extends Model
{
    use HasFactory;

    /**
     * RELATION
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * ACCESSORS
     */
    public function getPriceQuantityAttribute()
    {
        if (!empty($this->quantity)) {
            return $this->product->price * $this->quantity;
        }
    }

    public function getPriceFormattedAttribute()
    {
        return number_format($this->priceQuantity / 100, 2, ',', ' ') . ' €';
    }

    /**
     * SCOPE
     */
    public function scopeThisProductItem(Builder $query, $cartId, $productId): Builder
    {
        return $query->with('product')->where('order_id', $cartId)
            ->where('product_id', $productId);
    }
}
