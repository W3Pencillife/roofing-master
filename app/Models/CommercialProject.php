<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialProject extends Model
{
    use HasFactory;

    protected $table = 'commercial_projects'; // correct table

    protected $fillable = [
        'title', 'description', 'image',
        'feature_1','feature_2','feature_3','feature_4','feature_5'
    ];
}
