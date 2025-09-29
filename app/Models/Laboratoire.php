<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratoire extends Model
{
   protected $fillable = [
    'nom',
    'sigle',
    'responsable',
    'email',
    'telephone',
    'etablissement',
    'discipline',
    'description',
    'site_web',
    'logo'
];

}
