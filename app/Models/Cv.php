<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    // Nom explicite de la table si elle n’est pas au pluriel
    protected $table = 'cv';

    // Champs autorisés à être remplis automatiquement
    protected $fillable = [
        // Champs existants
        'photo',
        'diplomes',
        'domaines_competence',
        'experience',
        'langues',
        'autres_infos',
        'site_web',
        'user_id',

        // Champs du formulaire Blade
        'full_name',
        'job_title',
        'email',
        'phone',
        'city',
        'linkedin',
        'github',
        'summary',
        'skills',
        'educations',
        'experiences',
        'interests',
        'cv_path', // chemin du fichier PDF/DOC uploadé
    ];

    // Relation institutionnelle : chaque CV appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}




