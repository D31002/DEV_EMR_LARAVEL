<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class PhieuChamSocDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'monitoring_dateTime',
        'progress_notes',
        'care_orders',
        'signer_code',
        'signer_name',
        'created_by_userName',
        'created_by_loginName',
        'signed',
        'phieu_cham_soc_id'
    ];

    public function phieuChamSoc()
    {
        return $this->belongsTo(PhieuChamSoc::class, 'phieu_cham_soc_id', '_id'); 
    }
}
