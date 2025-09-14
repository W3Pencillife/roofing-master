<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapSetting extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'email',
        'map_embed_url',
        'location_name',
        'map_height'
    ];
}
