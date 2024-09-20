<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
       // Assuming this is a foreign key linking to the 'users' table
        'user_id', 
        'address',
        'phone_number',
        'education',
        // Add other attributes as needed
    ];
}
