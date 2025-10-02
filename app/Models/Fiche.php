<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'record_type',
        'content',
        'creation_date',
        'url',
        'responsible',
        'status',
        'fichier', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function thematique() {
        return $this->belongsTo(Thematique::class);
    }

}
