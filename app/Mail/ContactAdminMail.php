<?php

namespace App\Mail;

use App\Models\ContactMessage;
use App\Models\Role;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageId;
    public $role;

    public function __construct(ContactMessage $message, $role)
    {
        $this->messageId = $message->id;
        $this->role = $role == Role::ADMIN ? 'admin' : 'client';
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.front.contactAdminMessage.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.front.admin-contact',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
