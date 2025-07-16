<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class WelcomeUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $siteName;

    public function __construct(User $user, string $siteName)
    {
        $this->user = $user;
        $this->siteName = $siteName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to ' . $this->siteName,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.users.welcome',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
