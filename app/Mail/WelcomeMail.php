<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $user,
        public string $password
    ) { }

    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Date de conectare AbsolutInfo',
        );
    }

    public function content(): Content {
        return new Content(
            view: 'email.welcome',
            with: [ "url" => env("APP_URL") . "/login" ]
        );
    }

    public function attachments(): array {
        return [];
    }
}
