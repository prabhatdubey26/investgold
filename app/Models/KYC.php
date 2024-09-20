<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KYC extends Model
{
    protected $table = 'kycs';

    protected $fillable = [
        'user_id',
        'type',
        'image',
        'photo',
        'email',
        'backphoto',
        'status'
    ];

}
