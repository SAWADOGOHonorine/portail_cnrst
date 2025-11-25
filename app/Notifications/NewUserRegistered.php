<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\User;

class NewUserRegistered extends Notification
{
    use Queueable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // Canaux de notification
    public function via($notifiable)
    {
        return ['mail', 'database']; // Mail + Base de données
    }

    // Email envoyé à l’admin
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(' Nouvelle inscription')
            ->greeting('Bonjour Administrateur,')
            ->line('Un nouvel utilisateur vient de créer un compte :')
            ->line('Nom : ' . $this->user->last_name . ' ' . $this->user->first_name)
            ->line('Email : ' . $this->user->email)
            ->action('Voir la liste des utilisateurs', url('/admin/users'));
            
    }

    // Stocker dans la base pour notification web
    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'name' => $this->user->last_name . ' ' . $this->user->first_name,
            'email' => $this->user->email,
            'message' => 'Un nouvel utilisateur vient de s’inscrire',
            'url' => url('/admin/users'),
        ];
    }
}
