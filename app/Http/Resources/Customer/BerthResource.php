<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use App\Http\Resources\MarinaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BerthResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'leg' => $this->leg,
            'berth_number' => $this->berth_number,
            'internal_id' => $this->internal_id,
            'max_length_in_cm' => $this->max_length_in_cm,
            'max_width_in_cm' => $this->max_width_in_cm,
            'max_draught_in_cm' => $this->max_draught_in_cm,
            'overlay_x' => $this->overlay_x,
            'overlay_y' => $this->overlay_y,
            'overlay_rotate' => $this->overlay_rotate,
            'marina' => MarinaResource::make($this->whenLoaded('marina')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
