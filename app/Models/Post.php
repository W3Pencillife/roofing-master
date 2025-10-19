<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'content',
        'subtitle1',
        'subcontent1',
        'subtitle2',
        'subtitle3',
        'subcontent2',
        'image',
        'slug',
    ];
}
