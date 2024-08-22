<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeCriteria extends Model
{
    use HasFactory;

    protected $fillable = ['alternative_id', 'criteria_id', 'sub_criteria_id', 'status'];

    public function alternative()
    {
        return $this->belongsTo(Alternative::class);
    }
}
