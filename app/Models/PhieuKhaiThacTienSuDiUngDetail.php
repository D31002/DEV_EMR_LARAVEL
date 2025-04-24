<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PhieuKhaiThacTienSuDiUngDetail extends Model
{
    protected $fillable = [
        'stt',
        'content',
        'allergen_name',
        'occur_times',
        'no_reaction',
        'reaction_handling',
        'phieu_khai_thac_tien_su_di_ung_id',
    ];
    public function phieuKhaiThacTienSuDiUng()
    {
        return $this->belongsTo(PhieuKhaiThacTienSuDiUng::class, 'phieu_khai_thac_tien_su_di_ung_id', '_id');
    }
}
