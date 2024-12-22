<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCours extends Model
{
    protected $fillable = [
        'cours_id',
        'user_id',
        'start',
        'end',
        'status',
    ];
}