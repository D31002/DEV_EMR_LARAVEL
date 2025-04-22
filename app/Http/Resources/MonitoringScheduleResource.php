<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MonitoringScheduleResource extends JsonResource
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
            'care_id' => $this->care_id,
            'monitoring_dateTime' => $this->monitoring_dateTime,
            'progress_notes' => $this->progress_notes,
            'care_orders' => $this->care_orders,
            'signer' => $this->signer,
            'signer_name' => $this->signer_name,
            'created_by_userName' => $this->created_by_userName,
            'created_by_loginName' => $this->created_by_loginName,
            'signed' => $this->signed,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
