<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'cours_id',
        'user_id',
        'price',
        'status',
        'payment_method'
    ];
}
