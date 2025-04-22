<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Care extends Model
{

    protected $fillable = [
        'code',
        'created_by_userName',
        'created_by_loginName',
        'signed',
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
        'icd_text'
    ];

    public function monitoringSchedules()
    {
        return $this->hasMany(MonitoringSchedule::class, 'care_id', '_id');
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
        $counter = Counter::where('key', 'care_code')->first();

        if (!$counter) {
            $counter = Counter::create([
                'key' => 'care_code',
                'seq' => 1
            ]);
            return 1;
        }

        $counter->increment('seq');
        return $counter->seq;
    }
}
