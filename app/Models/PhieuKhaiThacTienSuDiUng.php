<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PhieuKhaiThacTienSuDiUng extends Model
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
        'allergy_history',
        'collection_date',
        'treatment_doctor_loginName',
        'treatment_doctor_userName',
        'information_collector_loginName',
        'information_collector_userName',
        'created_by_loginName',
        'created_by_userName',
        'signed',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($phieuKhaiThacTienSuDiUng) { 
            $phieuKhaiThacTienSuDiUng->code = self::getNextCode();
        });
    }
    public static function getNextCode()
    {
        $counter = Counter::where('key', 'phieu_khai_thac_tien_su_di_ung_code')->first();

        if (!$counter) {
            $counter = Counter::create([
                'key' => 'phieu_khai_thac_tien_su_di_ung_code',
                'seq' => 1
            ]);
            return 1;
        }

        $counter->increment('seq');
        return $counter->seq;
    }
}
