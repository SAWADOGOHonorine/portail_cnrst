<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageContenu;

    public function __construct($messageContenu)
    {
        $this->messageContenu = $messageContenu;
    }

    public function build()
    {
        return $this->subject('Test Laravel Gmail')
                    ->view('emails.test')
                    ->with(['messageContenu' => $this->messageContenu]);
    }
}
