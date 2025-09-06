<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'hero_title',
        'hero_text',
        'hero_button_text',
        'hero_bg',
    ];
}

