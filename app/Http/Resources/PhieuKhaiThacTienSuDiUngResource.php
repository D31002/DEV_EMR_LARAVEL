<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhieuKhaiThacTienSuDiUngResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'key' => $this->id,
            'id' => $this->id,
            'code' => $this->code,
            'treatment_code' => $this->treatment_code,
            'patient_code' => $this->patient_code,
            'patient_fullname' => $this->patient_fullname,
            'patient_dob' => $this->patient_dob,
            'patient_gender' => $this->patient_gender,
            'patient_address' => $this->patient_address,
            'patient_ethnicName' => $this->patient_ethnicName,
            'in_time' => $this->in_time,
            'department' => $this->department,
            'bed_number' => $this->bed_number,
            'bed_room' => $this->bed_room,
            'icd_code' => $this->icd_code,
            'icd_name' => $this->icd_name,
            'icd_subCode' => $this->icd_subCode,
            'icd_text' => $this->icd_text,
            'allergy_history' => $this->allergy_history,
            'collection_date' => $this->collection_date,
            'treatment_doctor_loginName' => $this->treatment_doctor_loginName,
            'treatment_doctor_userName' => $this->treatment_doctor_userName,
            'information_collector_loginName' => $this->information_collector_loginName,
            'information_collector_userName' => $this->information_collector_userName,
            'created_by_loginName' => $this->created_by_loginName,
            'created_by_userName' => $this->created_by_userName,
            'signed' => $this->signed,
            'branch_name' => $this->branch_name,
            'parent_organization_name' => $this->parent_organization_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'details' => PhieuKhaiThacTienSuDiUngDetailResource::collection($this->whenLoaded('details'))
        ];
    }
}
