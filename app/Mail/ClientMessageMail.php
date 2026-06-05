<?php

namespace App\Mail;

use App\Models\Account;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public Account $sender;

    public $messageId;
    public function __construct(Account $sender, Message $message)
    {
        $this->sender = $sender;
        $this->messageId = $message->id;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.admin.message.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.client.message',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
