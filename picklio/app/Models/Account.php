<?php

namespace App\Models;

use Database\Factories\AccountFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['firstname', 'lastname', 'description', 'email', 'phone', 'postal_code', 'address', 'country', 'user_id', 'role_id', 'status_id'])]
class Account extends Model
{
    /** @use HasFactory<AccountFactory> */
    use HasFactory;

    /**
     * RELATION
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * ACCESSORS
     */
    public function getStatusNameAttribute()
    {
        return $this->status()->where('id', $this->status_id)->first()->status;
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * SCOPE
     */
    public function scopeMerchants(Builder $query): Builder
    {
        return $query->where('role_id', Role::MERCHANT);
    }
}
