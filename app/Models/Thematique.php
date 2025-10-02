<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thematique extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function fiches() {
        return $this->hasMany(Fiche::class);
    }

    // Relation avec les publications
    public function publications() {
        return $this->hasMany(Publication::class);
    }
}


