<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeDocument extends Model
{
    use HasFactory;

    protected $fillable = ['alternative_profile_id', 'ktp', 'bakalcalon', 'ijazah', 'pemilih', 'foto', 'jasmani', 'rohani', 'narkoba', 'mantan', 'terpidana', 'mundur', 'pengadilan', 'beda_parpol', 'pemilu', 'gelar'];

    // public function docSchool()
    // {
    //     return $this->hasMany(AlternativeDocumentSchool::class);
    // }
}
