<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'journal',
        'publication_year',
        'url',
        'summary',
        'author',
        'co_authors',
        'publication_date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function thematique() {
        return $this->belongsTo(Thematique::class);
    }

}
