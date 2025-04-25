<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhieuChamSocCap2DetailResource extends JsonResource
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
            'phieu_cham_soc_cap2_id' => $this->phieu_cham_soc_cap2_id,
            'dateTime_care' => $this->dateTime_care,
            'patient_condition' => $this->patient_condition,
            'care_goals' => $this->care_goals,
            'nursing_actions' => $this->nursing_actions,
            'evaluation_notes' => $this->evaluation_notes,
            'nurse_practice_code' => $this->nurse_practice_code,
            'nurse_practice_name' => $this->nurse_practice_name,
            'created_by_userName' => $this->created_by_userName,
            'created_by_loginName' => $this->created_by_loginName,
            'signed' => $this->signed,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
