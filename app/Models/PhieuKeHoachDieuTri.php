<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PhieuKeHoachDieuTri extends Model
{

    protected $fillable = [
        'code',
        'patient_code',
        'patient_fullname',
        'patient_dob',
        'patient_gender',
        'in_time',
        'department',
        'bed_number',
        'bed_room',
        'icd_code',
        'icd_name',
        'icd_subCode',
        'icd_text',
        'patient_request_first',
        'patient_request_second',
        'patient_request_last',
        'estimated_hospital_days',
        'estimated_total_cost',
        'patient_relative_type',
        'patient_relative_name',
        'treatment_doctor_loginName',
        'treatment_doctor_userName',
        'department_head_approved_loginName',
        'department_head_approved_userName',
        'created_by_loginName',
        'created_by_userName',
        'signed',
    ];

    public function details()
    {
        return $this->hasMany(PhieuKeHoachDieuTriDetail::class, 'phieu_ke_hoach_dieu_tri_id', '_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($phieuKeHoachDieuTri) {
            $phieuKeHoachDieuTri->code = self::getNextCode();
        });
    }
    public static function getNextCode()
    {
        $counter = Counter::where('key', 'phieu_ke_hoach_dieu_tri_code')->first();

        if (!$counter) {
            $counter = Counter::create([
                'key' => 'phieu_ke_hoach_dieu_tri_code',
                'seq' => 1
            ]);
            return 1;
        }

        $counter->increment('seq');
        return $counter->seq;
    }
}
