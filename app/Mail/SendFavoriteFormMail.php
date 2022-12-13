<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendFavoriteFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private array $favoriteItems,
        private string $name,
        private string $email,
        private ?string $comment = null
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Новый заказ с сайта Mammoh',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.favorite_form',
            with: [
                'items' => $this->favoriteItems,
                'name' => $this->name,
                'email' => $this->email,
                'comment' => $this->comment,
            ]
        );
    }
}
