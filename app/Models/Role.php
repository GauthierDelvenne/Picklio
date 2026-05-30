<?php

namespace App\Models;

use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['role'])]
class Role extends Model
{
    /** @use HasFactory<RoleFactory> */
    use HasFactory;

    /**
     * CONST
     */
    const ADMIN = 1;

    const MERCHANT = 2;

    const CLIENT = 3;

    const WAREHOUSE = 4;

    /**
     * RELATION
     */
    public function account(): HasMany
    {
        return $this->hasMany(Account::class);
    }
}
