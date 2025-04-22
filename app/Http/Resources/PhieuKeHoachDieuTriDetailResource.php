<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhieuKeHoachDieuTriDetailResource extends JsonResource
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
            'phieu_ke_hoach_dieu_tri_id' => $this->phieu_ke_hoach_dieu_tri_id,
            'issue' => $this->issue,
            'clinical_tests' => $this->clinical_tests,
            'treatment_plan' => $this->treatment_plan,
            'note' => $this->note,
        ];
    }
}
