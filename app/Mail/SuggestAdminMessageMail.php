<?php

namespace App\Mail;

use App\Models\SuggestMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuggestAdminMessageMail extends Mailable
{
    use Queueable, SerializesModels;
    public $messageId;
    public $name;

    public function __construct(SuggestMessage $message, $name)
    {
        $this->messageId = $message->id;
        $this->name = $name;

    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.front.suggestAdminMessage.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.front.suggest-admin-message',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
