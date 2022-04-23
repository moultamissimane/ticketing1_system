<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'question',
        'tags'
    ];


    public function ownedBy(User $user)
    {
        return $user->id === $this->user_id;
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
