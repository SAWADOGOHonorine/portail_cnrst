<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Cv;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Les attributs que l'on peut remplir via formulaire ou create()
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'adresse',
        'role',
        'password',
    ];

    /**
     * Les attributs à cacher lors de la sérialisation (ex. API JSON)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les conversions de types automatiques
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relation : un utilisateur possède un CV
     */
    public function cv()
    {
        return $this->hasOne(Cv::class);
    }

    /**
     * Vérifie si l'utilisateur est administrateur
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Vérifie si l'utilisateur est visiteur
     */
    public function isVisiteur()
    {
        return $this->role === 'visiteur';
    }
}
