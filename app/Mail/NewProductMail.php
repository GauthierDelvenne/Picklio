<?php

namespace App\Mail;

use App\Models\Account;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewProductMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public $productId;

    public function __construct(Account $merchant, Product $product)
    {
        $this->name = $merchant->user->name;
        $this->productId = $product->id;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail.admin.newProduct.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.client.new-product',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
