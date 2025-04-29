<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BangKiemSauKhiMoResource extends JsonResource
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
            'treatment_code' => $this->treatment_code,
            'patient_fullname' => $this->patient_fullname,
            'patient_dob' => $this->patient_dob,
            'patient_gender' => $this->patient_gender,
            'dateTime_surgery' => $this->dateTime_surgery,
            'dateTime_end' => $this->dateTime_end,
            'diagnosis_after' => $this->diagnosis_after,
            'type_surgery' => $this->type_surgery,
            'created_by_userName' => $this->created_by_userName,
            'created_by_loginName' => $this->created_by_loginName,
            'signed' => $this->signed,
            'branch_name' => $this->branch_name,
            'parent_organization_name' => $this->parent_organization_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
