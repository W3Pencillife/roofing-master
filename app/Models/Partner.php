<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'link',
        'image',
    ];
}
