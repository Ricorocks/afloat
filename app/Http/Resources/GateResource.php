<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\GateEventResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'location' => $this->location,
            'marina' => MarinaResource::make($this->whenLoaded('marina')),
            'gate_events' => GateEventResource::collection($this->whenLoaded('gateEvents')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
