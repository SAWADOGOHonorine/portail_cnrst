<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AccountCreated extends Notification
{
    public function via($notifiable)
    {
        return ['mail']; // envoi par mail
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Bienvenue sur notre plateforme ')
            ->greeting('Bonjour ' . ucfirst($notifiable->first_name) . ' !')
            ->line('Votre compte a été créé avec succès.')
            ->line('Vous pouvez maintenant vous connecter avec votre adresse email : ' . $notifiable->email)
            ->action('Se connecter', route('login'))
            ->line('Merci de nous faire confiance ');
    }
}
