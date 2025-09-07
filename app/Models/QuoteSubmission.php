<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteSubmission extends Model
{
    use HasFactory;

    protected $table = 'quote_submissions';

    protected $fillable = ['name', 'email', 'phone', 'subject', 'message', 'status'];
}
