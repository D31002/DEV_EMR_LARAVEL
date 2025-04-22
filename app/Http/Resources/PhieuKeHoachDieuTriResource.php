<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhieuKeHoachDieuTriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "key"=> $this->id,
            'id' => $this->id,
            'code' => $this->code,
            'patient_code' => $this->patient_code,
            'patient_fullname' => $this->patient_fullname,
            'patient_dob' => $this->patient_dob,
            'patient_gender' => $this->patient_gender,
            'in_time' => $this->in_time,
            'department' => $this->department,
            'bed_number' => $this->bed_number,
            'bed_room' => $this->bed_room,
            'icd_code' => $this->icd_code,
            'icd_name' => $this->icd_name,
            'icd_subCode' => $this->icd_subCode,
            'icd_text' => $this->icd_text,
            'patient_request_first' => $this->patient_request_first,
            'patient_request_second' => $this->patient_request_second,
            'patient_request_last' => $this->patient_request_last,
            'estimated_hospital_days' => $this->estimated_hospital_days,
            'estimated_total_cost' => $this->estimated_total_cost,
            'patient_relative_type' => $this->patient_relative_type,
            'patient_relative_name' => $this->patient_relative_name,
            'treatment_doctor_loginName' => $this->treatment_doctor_loginName,
            'treatment_doctor_userName' => $this->treatment_doctor_userName,
            'department_head_approved_loginName' => $this->department_head_approved_loginName,
            'department_head_approved_userName' => $this->department_head_approved_userName,
            'created_by_loginName' => $this->created_by_loginName,
            'created_by_userName' => $this->created_by_userName,
            'signed' => $this->signed,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
            'details' => PhieuKeHoachDieuTriDetailResource::collection($this->whenLoaded('details'))
        ];
    }
}
