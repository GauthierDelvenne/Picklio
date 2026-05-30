<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class MessageStatus extends Model
{
    use HasFactory;

    /**
     * CONST
     */
    const VALID = 1;

    const UNREAD = 2;

    const UNVALID = 3;

    /**
     * RELATIONS
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function suggestMessages()
    {
        return $this->hasMany(SuggestMessage::class);
    }

    public function newMerchantMessages()
    {
        return $this->hasMany(NewMerchantMessage::class);
    }

    public function contactMessages()
    {
        return $this->hasMany(ContactMessage::class);
    }
}
