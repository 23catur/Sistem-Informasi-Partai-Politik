<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Religion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alternativeProfile extends Model
{
    use HasFactory;

    protected $fillable = ['alternative_id', 'no_kk', 'nik', 'place_of_birth', 'date_of_birth', 'gender', 'religion', 'phone_number', 'email'];

    protected $casts = [
        'gender' => Gender::class,
        'religion' => Religion::class,
    ];

    public function alternative()
    {
        return $this->belongsTo(Alternative::class);
    }

    public function address()
    {
        return $this->hasOne(alternativeAddress::class);
    }

    public function components()
    {
        return $this->hasMany(AlternativeCriteriaComponent::class);
    }

    public function document()
    {
        return $this->hasOne(AlternativeDocument::class);
    }
}
