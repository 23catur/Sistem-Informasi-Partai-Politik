<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alternativeAddress extends Model
{
    use HasFactory;

    protected $fillable = ['alternative_profile_id', 'address', 'rt', 'rw', 'village_id', 'zip_code'];

    public function alternativeProfile()
    {
        return $this->belongsTo(alternativeProfile::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function getFullAddressAttribute()
    {
        return "{$this->address} RT.{$this->rt}/RW.{$this->rw}, Kel. {$this->village->name}, Kec. {$this->village?->district->name}, {$this->village?->district?->city->name}, {$this->village?->district?->city->province->name}, {$this->zip_code}";
    }
}
