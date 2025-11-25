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
        'activation_token',
        'is_active',
    ];

    /**
     * Les attributs à cacher lors de la sérialisation
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
     * Vérifie si l'utilisateur a un rôle spécifique
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Vérifie si l'utilisateur a l'un des rôles donnés (tableau)
     */
    public function hasAnyRole(array $roles)
    {
        return in_array($this->role, $roles);
    }

    /**
     * Raccourcis de lecture pour les rôles communs
     */
    public function isAdmin()   { return $this->role === 'admin'; }
    public function isSuperAdmin()   { return $this->role === 'super_admin'; }
    public function isDG()      { return $this->role === 'DG'; }
    public function isDGA()     { return $this->role === 'DGA'; }
    public function isDirecteur() { return $this->role === 'directeur'; }
    public function isDirecteurinstitut() { return $this->role === 'Directeur_institut'; }
    public function isChefdepartement()  { return $this->role === 'Chef_departement'; }
    public function isVisiteur()  { return $this->role === 'visiteur'; }
}
