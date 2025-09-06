<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChooseSection extends Model
{
    protected $fillable = ['title', 'highlight'];

    public function benefits()
    {
        return $this->hasMany(ChooseBenefit::class);
    }
}
