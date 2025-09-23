<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'type',
        'titre',
        'auteurs',
        'annee',
        'theme',
        'resume',
        'mots_cles',
        'source',
        'lien_externe',
        'fichier',
    ];
}


