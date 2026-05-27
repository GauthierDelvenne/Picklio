<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['sender_id', 'recipient_id', 'message_status_id', 'title', 'description', 'id'])]
class Message extends Model
{
    use HasFactory;

    /**
     * RELATIONS
     */

    public function sender(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'sender_id');
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'recipient_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(MessageStatus::class, 'message_status_id');
    }

    /**
     * SCOPE
     */
    public function scopeMessage(Builder $query, $accountId): Builder
    {
        return $query->join('accounts', 'messages.sender_id', '=', 'accounts.id')
            ->join('users', 'accounts.user_id', '=', 'users.id')
            ->where('recipient_id', $accountId)
            ->select('messages.*', 'users.name as name');
    }

    public function scopeOwnMessage(Builder $query, $accountId): Builder
    {
        return $query->join('accounts', 'messages.sender_id', '=', 'accounts.id')
            ->join('users', 'accounts.user_id', '=', 'users.id')
            ->where('sender_id', $accountId)
            ->select('messages.*', 'users.name as name');
    }
}
