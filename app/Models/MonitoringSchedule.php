<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class MonitoringSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'monitoring_dateTime',
        'progress_notes',
        'care_orders',
        'signer',
        'signer_name',
        'signed',
        'created_by_userName',
        'created_by_loginName',
        'care_id'
    ];

    public function care()
    {
        return $this->belongsTo(Care::class, 'care_id', '_id'); 
    }
}
