<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chercheur extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'nom',
        'prenom',
        'titre',
        'grade',
        'specialite',
        'ufr',
        'departement',
        'genre',
        'nationalite',
        'position',
        'biographie',
        'parcours_academique',
        'diplomes',
        'laboratoire',
        'email',
        'telephone',
    ];

    // Conversion automatique JSON → array
    protected $casts = [
        'parcours_academique' => 'array',
        'diplomes' => 'array',
    ];

    // Relation : un chercheur peut avoir plusieurs articles
    public function articles()
    {
        return $this->hasMany(Article::class, 'chercheur_id');
    }

    // Nom complet pratique
    public function getNomCompletAttribute()
    {
        return trim("{$this->titre} {$this->prenom} {$this->nom}");
    }
}
