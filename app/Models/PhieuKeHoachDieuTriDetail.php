<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PhieuKeHoachDieuTriDetail extends Model
{
    protected $fillable = [
        'issue',
        'clinical_tests',
        'treatment_plan',
        'note',
        'icd_type',
        'phieu_ke_hoach_dieu_tri_id',
    ];

    public function phieuKeHoachDieuTri()
    {
        return $this->belongsTo(PhieuKeHoachDieuTri::class, 'phieu_ke_hoach_dieu_tri_id', '_id');
    }
}
