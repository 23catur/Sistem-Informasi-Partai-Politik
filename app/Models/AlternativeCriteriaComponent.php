<?php

namespace App\Models;

use App\Enums\CriteriaComponent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeCriteriaComponent extends Model
{
    use HasFactory;

    protected $fillable = ['alternative_profile_id', 'name_person', 'val_1', 'val_2', 'type'];

    protected $casts = [
        'type' => CriteriaComponent::class,
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
