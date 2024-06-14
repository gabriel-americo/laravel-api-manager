<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmação de Troca de Senha',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'admin.emails.confirm-reset-password',
            with: [
                'user' => $this->user
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
