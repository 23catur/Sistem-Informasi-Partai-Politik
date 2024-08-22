<?php

namespace App\Models;

use App\Enums\PeriodStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    protected $casts = [
        'status' => PeriodStatus::class,
    ];
}
