<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publication extends Model
{

    protected $fillable = [
        'titre',
        'journal',
        'annee',
        'lien_externe',
        'auteur',
        'co_auteurs',
        'resume',
        'statut',
        'user_id'
    ];

}

