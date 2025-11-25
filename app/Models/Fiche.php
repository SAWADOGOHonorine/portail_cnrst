<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    use HasFactory;

    /**
     * Les attributs pouvant être remplis en masse
     */
    protected $fillable = [
        'user_id',
        'record_type',
        'titre',
        'auteurs',
        'annee',
        'discipline',
        'thematique',
        'mots_cles',
        'resume',
        'content',
        'ouvrage',
        'source',
        'reference',
        'url',
        'creation_date',
        'responsible',
        'status',
        'fichier',
        'document',
    ];

    /**
     * Les attributs considérés comme des dates
     */
    protected $dates = [
        'creation_date',
        'created_at',
        'updated_at',
    ];

    /**
     * Relation : une fiche appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation : une fiche appartient à une thématique
     */
    public function thematique()
    {
        return $this->belongsTo(Thematique::class);
    }

    /**
     * Accessor pour le type de publication
     */
    public function getTypeAttribute()
    {
        return 'Fiche';
    }

    /**
     * Accessor pour titre (compatibilité avec Blade)
     */
    
    public function getTitreAttribute()
    {
        return $this->attributes['titre'] ?? '';
    }

    /**
     * Accessor pour résumé (compatibilité avec Blade)
     */
    public function getResumeAttribute()
    {
        return $this->attributes['resume'] ?? '';
    }
}
