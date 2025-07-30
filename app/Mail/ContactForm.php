<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Contact Form Submission');
    }

    public function content(): Content
    {
        $theme = Auth::user()->selected_theme ?? '';

        if ($theme) {
            return new Content(
                view: "frontend.themes.$theme.mail.contactform",
                with: ['data' => $this->data],
            );
        }

        // Fallback return in case $theme is empty
        return new Content(
            view: 'frontend.themes.default.mail.contactform', // or a safe default view
            with: ['data' => $this->data],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

