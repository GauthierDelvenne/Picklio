<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CancelOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public  $code;

    public function __construct($code)
    {
        $this->code = $code;
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
