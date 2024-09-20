<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class KYCDocument extends Model
{
    protected $table = 'kyc_documents';
    protected $fillable = [
            'file_name', // Adjust as needed
            'kyc_id',
    ];

    public function kyc()
    {
        return $this->belongsTo(KYC::class, 'kyc_id');

    }
}
