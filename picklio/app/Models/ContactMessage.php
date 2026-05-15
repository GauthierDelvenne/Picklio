<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

#[Fillable(['recipient_id', 'message_status_id', 'name', 'email', 'phone', 'title', 'description', 'id'])]
class ContactMessage extends Model
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

    /**
     *  SCOPE
     */
    public function scopeContactMessage(Builder $query, $userId): Builder
    {
        return $query->join('accounts', 'contact_messages.recipient_id', '=', 'accounts.id')
            ->where('accounts.user_id', $userId)
            ->select('contact_messages.*');
    }
}
