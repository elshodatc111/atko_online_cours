<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessaga extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'discriotion',
    ];
}
