<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhieuTruyenDichResource extends JsonResource
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
            'created_by_userName' => $this->created_by_userName,
            'created_by_loginName' => $this->created_by_loginName,
            'signed' => $this->signed,
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
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'details' => PhieuTruyenDichDetailResource::collection($this->whenLoaded('details'))
        ];
    }
}
