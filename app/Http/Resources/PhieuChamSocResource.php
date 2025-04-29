<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhieuChamSocResource extends JsonResource
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
            'hospitalization_number' => $this->hospitalization_number,
            'receipt_number' => $this->receipt_number,
            'department' => $this->department,
            'patient_fullname' => $this->patient_fullname,
            'patient_dob' => $this->patient_dob,
            'patient_gender' => $this->patient_gender,
            'bed_number' => $this->bed_number,
            'bed_room' => $this->bed_room,
            'icd_code' => $this->icd_code,
            'icd_name' => $this->icd_name,
            'icd_subCode' => $this->icd_subCode,
            'icd_text' => $this->icd_text,
            'created_by_userName' => $this->created_by_userName,
            'created_by_loginName' => $this->created_by_loginName,
            'signed' => $this->signed,
            'branch_name' => $this->branch_name,
            'parent_organization_name' => $this->parent_organization_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'details' => PhieuChamSocDetailResource::collection($this->whenLoaded('details'))
        ];
    }
}
