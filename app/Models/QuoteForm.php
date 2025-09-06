<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteForm extends Model
{
    use HasFactory;

    protected $table = 'quote_forms'; // ensure table name is correct
    protected $fillable = [
        'title', 'subtitle', 'benefit_1', 'benefit_2', 'benefit_3'
    ];
}
