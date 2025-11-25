<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $activationUrl = url("/users/activate/{$this->user->activation_token}");


        return $this->subject('Activation de votre compte')
                    ->view('emails.activation')
                    ->with(['activationUrl' => $activationUrl, 'user' => $this->user]);
    }
}

