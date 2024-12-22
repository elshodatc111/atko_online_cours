<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursItem extends Model
{
    protected $fillable = [
        'cours_id',
        'item_name',
        'item_discription',
        'video_url',
        'audio_url',
    ];
}
