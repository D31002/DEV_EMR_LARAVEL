<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PhieuTruyenDichDetail extends Model
{
    protected $fillable = [
        'monitoring_dateTime',
        'transmission_name',
        'capacity_transmission',
        'amount_transmission',
        'unit_transmission',
        'unit_transmission_name',
        'unit_convert',
        'production_batch_transmission',
        'medicine_name',
        'amount_medicine',
        'production_batch_medicine',
        'speed',
        'inTime',
        'endTime',
        'doctor_prescribed',
        'nurse_practice',
        'signed',
        'created_by_userName',
        'created_by_loginName',
        'phieu_truyen_dich_id',
    ];

    public function phieuTruyenDich()
    {
        return $this->belongsTo(PhieuTruyenDich::class, 'phieu_truyen_dich_id', '_id');
    }
}
