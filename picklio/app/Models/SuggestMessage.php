<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['recipient_id', 'message_status_id', 'name', 'email', 'merchantSuggest', 'productSuggest', 'id'])]
class SuggestMessage extends Model
{
    use HasFactory;

    /**
     * RELATIONS
     */

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'recipient_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(MessageStatus::class, 'message_status_id');
    }
}
