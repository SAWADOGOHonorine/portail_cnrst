<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    protected $table = 'cv'; // 👈 Empêche Laravel de chercher "cvs"
    

    // Autorise les champs à être remplis via create() ou update()
    protected $fillable = [
        'photo',
        'diplomes',
        'domaines_competence',
        'experience',
        'langues',
        'autres_infos',
        'site_web',
        'user_id',
    ];

     //  Relation entre CV et utilisateur
    public function user()
{
    return $this->belongsTo(User::class);
}
}



