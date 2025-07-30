<?php

namespace App\Listeners;

use App\Events\ContactFormEmail;
use App\Mail\ContactForm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ContactFormMailListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(ContactFormEmail $event): void
    {
        $data = [
            'message' => 'Thank you for contacting us! Our team will reach out to you.',
        ];

        Mail::to($event->data)->send(new ContactForm($data));
    }
}

