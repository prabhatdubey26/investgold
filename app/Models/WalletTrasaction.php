<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTrasaction extends Model
{
    use HasFactory;
    protected $table = 'wallet_trasactions';
    protected $fillable = [
        'user_id', 
        'amount',
        'transaction_type',
        'payment_status',
        'method',
        'currency',
        'json_response',
        'remarks'
    ];
}
