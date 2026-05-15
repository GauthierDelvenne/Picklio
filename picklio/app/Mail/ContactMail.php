<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.front.suggestMessage.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.front.contact',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
