<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CancelOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.front.cancel-order.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.front.cancel-order',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
