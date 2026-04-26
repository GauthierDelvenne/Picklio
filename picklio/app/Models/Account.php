<?php

namespace App\Models;

use Database\Factories\AccountFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['firstname', 'lastname', 'description', 'email', 'phone', 'status', 'postal_code', 'address', 'country', 'user_id', 'role_id'])]
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

    public function role(): HasOne
    {
        return $this->hasOne(Role::class);
    }
}
