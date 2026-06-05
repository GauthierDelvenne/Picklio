<?php

namespace App\Mail;

use App\Models\NewMerchantMessage;
use App\Models\SuggestMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewMerchantAdminMessageMail extends Mailable
{
    use Queueable, SerializesModels;
    public $messageId;
    public $name;

    public function __construct(NewMerchantMessage $message, $name)
    {
        $this->messageId = $message->id;
        $this->name = $name;

    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.front.newMerchantAdminMessage.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.front.new-merchant-admin-message',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
