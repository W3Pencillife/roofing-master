<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChooseBenefit extends Model
{
    protected $fillable = ['choose_section_id', 'icon', 'heading', 'description'];

    public function chooseSection()
    {
        return $this->belongsTo(ChooseSection::class);
    }
}

