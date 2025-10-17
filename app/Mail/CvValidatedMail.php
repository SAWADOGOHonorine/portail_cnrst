<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable; 
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class CvValidatedMail extends Mailable 
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('CV soumis avec succès')
                    ->view('emails.cv_validated');
    }
}

