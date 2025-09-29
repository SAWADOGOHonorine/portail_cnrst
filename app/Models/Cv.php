<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    // Si ta table s’appelle bien 'cvs', tu peux supprimer cette ligne
    protected $table = 'cv';

    protected $fillable = [
        'photo',
        'diplomes',
        'domaines_competence',
        'experience',
        'langues',
        'autres_infos',
        'site_web',
        'user_id',
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
        'cv_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}





