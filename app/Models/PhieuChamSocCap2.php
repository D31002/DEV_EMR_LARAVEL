<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PhieuChamSocCap2 extends Model
{
    protected $fillable = [
        'code',
        'hospitalization_number',
        'treatment_code',
        'in_time',
        'receipt_number',
        'department',
        'patient_fullname',
        'patient_dob',
        'patient_gender',
        'bed_number',
        'bed_room',
        'icd_code',
        'icd_name',
        'icd_subCode',
        'icd_text',
        'signed',
        'created_by_userName',
        'created_by_loginName',
    ];

    public function details()
    {
        return $this->hasMany(PhieuChamSocCap2Detail::class, 'phieu_cham_soc_cap2_id', '_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($care) {
            $care->code = self::getNextCode();
        });
    }
    public static function getNextCode()
    {
        $counter = Counter::where('key', 'phieu_cham_soc_cap2_code')->first();

        if (!$counter) {
            $counter = Counter::create([
                'key' => 'phieu_cham_soc_cap2_code',
                'seq' => 1
            ]);
            return 1;
        }

        $counter->increment('seq');
        return $counter->seq;
    }
}
