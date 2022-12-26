<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendZdyConfiguratorFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private string $title,
        private string $fio,
        private string $phone,
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
            view: 'mail.zdy_cinfigurator_form',
            with: [
                'title' => $this->title,
                'fio' => $this->fio,
                'email' => $this->email,
                'comment' => $this->comment,
                'phone' => $this->phone,
            ]
        );
    }
}
