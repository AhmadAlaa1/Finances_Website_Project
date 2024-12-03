<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'amount',
    ];
}