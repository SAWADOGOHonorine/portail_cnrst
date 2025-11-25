<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cv extends Model
{
    use HasFactory;

    protected $table = 'cv';

    protected $fillable = [
        'user_id',
        'nom',
        'prenom',
        'email',
        'telephone',
        'whatsapp',
        'adresse',
        'ville',
        'pays', 
        'departement',  
        'institut', 
        'specialite', 
        'domaine', 
        'mot_cle', 
        'date_naissance',
        'lieu_naissance',
        'detaille_scientifique',
        'projet_recherche',
        'genre',
        'thematique_recherche',
        'cv_path',
        'photo',
        'diplomes',
        'domaines_competence',
        'experience',
        'langues',
        'autres_infos',
        'site_web',
        'full_name',
        'job_title',
        'linkedin',
        'github',
        'summary',
        'skills',
        'educations',
        'experiences',
        'interests',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getCvUrlAttribute()
    {
        return $this->cv_path ? asset('storage/cvs/'.$this->cv_path) : null;
    }

}





