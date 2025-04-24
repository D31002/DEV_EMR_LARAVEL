<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhieuKhaiThacTienSuDiUngDetailResource extends JsonResource
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
            'stt' => $this->stt,
            'content' => $this->content,
            'allergen_name' => $this->allergen_name,
            'occur_times' => $this->occur_times,
            'no_reaction' => $this->no_reaction,
            'reaction_handling' => $this->reaction_handling,
            'phieu_khai_thac_tien_su_di_ung_id' =>$this->phieu_khai_thac_tien_su_di_ung_id,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
