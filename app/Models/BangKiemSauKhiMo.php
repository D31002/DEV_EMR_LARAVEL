<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class BangKiemSauKhiMo extends Model
{
    protected $fillable = [
        'code',
        'treatment_code',
        'patient_fullname',
        'patient_dob',
        'patient_gender',
        'dateTime_surgery',
        'dateTime_end',
        'diagnosis_after',
        'type_surgery',
        'created_by_userName',
        'created_by_loginName',
        'signed',
        'branch_name',
        'parent_organization_name',
    ];

    public function details()
    {
        return $this->hasMany(BangKiemSauKhiMoDetail::class, 'bang_kiem_sau_khi_mo_id', '_id');
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
        $counter = Counter::where('key', 'bang_kiem_sau_khi_mo_code')->first();

        if (!$counter) {
            $counter = Counter::create([
                'key' => 'bang_kiem_sau_khi_mo_code',
                'seq' => 1
            ]);
            return 1;
        }

        $counter->increment('seq');
        return $counter->seq;
    }
}
