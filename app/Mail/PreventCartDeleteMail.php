<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PreventCartDeleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.front.order.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.front.prevent-cart-delete',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
