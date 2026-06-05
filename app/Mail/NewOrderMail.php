<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public $orderItems;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->orderItems = $this->order->orderItems;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.front.new-order.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.front.new-order',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
