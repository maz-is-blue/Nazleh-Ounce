<?php

namespace App\Mail;

use App\Models\Bar;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BarAssignedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Bar $bar, public User $user)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nazleh Ounce Verification Assigned'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.bar-assigned',
        );
    }
}
