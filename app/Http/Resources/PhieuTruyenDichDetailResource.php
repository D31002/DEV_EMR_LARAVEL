<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhieuTruyenDichDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'key'                          => $this->id,
            'id'                           => $this->id,
            'phieu_truyen_dich_id'         => $this->phieu_truyen_dich_id,
            'monitoring_dateTime'          => $this->monitoring_dateTime,
            'transmission_name'            => $this->transmission_name,
            'capacity_transmission'        => $this->capacity_transmission,
            'amount_transmission'          => $this->amount_transmission,
            'unit_transmission'            => $this->unit_transmission,
            'unit_transmission_name'       => $this->unit_transmission_name,
            'unit_convert'                 => $this->unit_convert,
            'production_batch_transmission'=> $this->production_batch_transmission,
            'medicine_name'                => $this->medicine_name,
            'amount_medicine'              => $this->amount_medicine,
            'production_batch_medicine'    => $this->production_batch_medicine,
            'speed'                        => $this->speed,
            'inTime'                       => $this->inTime,
            'endTime'                      => $this->endTime,
            'doctor_prescribed_code'       => $this->doctor_prescribed_code,
            'doctor_prescribed_name'       => $this->doctor_prescribed_name,
            'nurse_practice_code'          => $this->nurse_practice_code,
            'nurse_practice_name'          => $this->nurse_practice_name,
            'created_by_userName'          => $this->created_by_userName,
            'created_by_loginName'         => $this->created_by_loginName,
            'signed'                       => $this->signed,
            'created_at'                   => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'                   => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
