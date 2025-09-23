<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    // Table associée (par défaut Laravel ajoute un "s", donc equipments)
    protected $table = 'equipments';

    // Champs autorisés pour l'insertion
    protected $fillable = ['nom', 'etat', 'date_arrivee', 'laboratoire'];
}
