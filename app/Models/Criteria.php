<?php

namespace App\Models;

use App\Enums\CriteriaAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'attribute', 'weight', 'description'];

    protected $casts = [
        'attribute' => CriteriaAttribute::class,
    ];

    public function subs()
    {
        return $this->hasMany(SubCriteria::class);
    }
}
