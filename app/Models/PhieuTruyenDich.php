<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PhieuTruyenDich extends Model
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
        return $this->hasMany(PhieuTruyenDichDetail::class, 'phieu_truyen_dich_id', '_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($phieuTruyenDich) {
            $phieuTruyenDich->code = self::getNextCode();
        });
    }
    public static function getNextCode()
    {
        $counter = Counter::where('key', 'phieu_truyen_dich_code')->first();

        if (!$counter) {
            $counter = Counter::create([
                'key' => 'phieu_truyen_dich_code',
                'seq' => 1
            ]);
            return 1;
        }

        $counter->increment('seq');
        return $counter->seq;
    }
}
