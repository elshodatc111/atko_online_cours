<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = [
        'cours_name',
        'cours_image',
        'cours_description',
        'lessin_time',
        'techer_name',
        'lessin_daraja',
        'lessin_price',
        'lessin_davomiyligi',
    ];
}