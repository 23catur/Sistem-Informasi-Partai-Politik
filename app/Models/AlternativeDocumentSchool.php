<?php

namespace App\Models;

use App\Enums\DocumentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeDocumentSchool extends Model
{
    use HasFactory;

    protected $fillable = ['alternative_document_id', 'raport', 'type'];

    protected $casts = [
        'type' => DocumentType::class,
    ];
}
