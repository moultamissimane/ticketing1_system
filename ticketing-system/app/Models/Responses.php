<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    protected $fillable = [
        'question_id',
        'user_id',
        'response',
    ];
}
