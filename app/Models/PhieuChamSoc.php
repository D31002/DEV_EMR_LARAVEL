<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PhieuChamSoc extends Model
{

    protected $fillable = [
        'code',
        'treatment_code',
        'hospitalization_number',
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
        'created_by_userName',
        'created_by_loginName',
        'signed',
    ];

    public function details()
    {
        return $this->hasMany(PhieuChamSocDetail::class, 'phieu_cham_soc_id', '_id');
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
        $counter = Counter::where('key', 'phieu_cham_soc_code')->first();

        if (!$counter) {
            $counter = Counter::create([
                'key' => 'phieu_cham_soc_code',
                'seq' => 1
            ]);
            return 1;
        }

        $counter->increment('seq');
        return $counter->seq;
    }
}
