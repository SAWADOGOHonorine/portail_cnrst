<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;

    // Nom de la table (facultatif si le nom est "partenaires")
    protected $table = 'partenaires';

    // Colonnes modifiables en base
    protected $fillable = [
        'titre',
        'domaine',
    ];
}
