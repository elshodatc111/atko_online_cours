<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Techer extends Model{
    protected $fillable = [
        'techer_name',
        'techer_image',
        'techer_title',
        'techer_discription',
        'telegram',
        'instagram',
        'facebook',
    ];
}