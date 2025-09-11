<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CommercialProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'features',
    ];

    // Cast features as an array
    protected $casts = [
        'features' => 'array',
    ];
}

