<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PhieuChamSocCap2Detail extends Model
{
    protected $fillable = [
        'dateTime_care',
        'patient_condition',
        'care_goals',
        'nursing_actions',
        'evaluation_notes',
        'nurse_practice_code',
        'nurse_practice_name',
        'created_by_userName',
        'created_by_loginName',
        'signed',
        'phieu_cham_soc_cap2_id'
    ];

    public function phieuChamSocCap2()
    {
        return $this->belongsTo(PhieuChamSocCap2::class, 'phieu_cham_soc_cap2_id', '_id'); 
    }
}
