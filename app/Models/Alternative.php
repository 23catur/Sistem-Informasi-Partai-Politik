<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'status'];

    public function criteria()
    {
        return $this->belongsToMany(Criteria::class, 'alternative_criterias')
            ->orderby('alternative_id')
            ->orderBy('criteria_id')
            ->withPivot('sub_criteria_id')->withTimestamps();
    }

    public function subCriteria()
    {
        return $this->belongsToMany(SubCriteria::class, 'alternative_criterias')
            ->orderby('alternative_id')
            ->orderBy('criteria_id')
            ->withPivot('criteria_id')->withTimestamps();
    }

    public function profile()
    {
        return $this->hasOne(alternativeProfile::class);
    }
}
