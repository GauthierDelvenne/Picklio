<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewMerchantMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.front.newMerchantMessage.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.front.new-merchant-message',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
