<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['status'])]
class Status extends Model
{
    use HasFactory;

    /**
     * CONST
     */
    const ACTIVE = 1;
    const INACTIVE = 2;

    /**
     * RELATION
     */
    public function account(): HasMany
    {
        return $this->hasMany(Account::class);
    }
}
