<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\KeyResource;
use App\Http\Resources\GateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MarinaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'city' => $this->city,
            'county' => $this->county,
            'postcode' => $this->postcode,
            'country' => $this->country,
            'phone_number' => $this->phone_number,
            'website' => $this->website,
            'vfh_channel' => $this->vfh_channel,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'gates' => GateResource::collection($this->whenLoaded('gates')),
            'keys' => KeyResource::collection($this->whenLoaded('keys')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
