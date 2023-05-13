<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use App\Http\Resources\MarinaResource;
use App\Http\Resources\BerthContractResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BoatResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'make' => $this->make,
            'length_in_cm' => $this->length_in_cm,
            'width_in_cm' => $this->width_in_cm,
            'draught_in_cm' => $this->draught_in_cm,
            'type' => $this->type,
            'date_of_construction' => $this->date_of_construction,
            'insurance_number' => $this->insurance_number,
            'user' => UserResource::make($this->whenLoaded('user')),
            'marina' => MarinaResource::make($this->whenLoaded('marina')),
            'berth_contracts' => BerthContractResource::collection($this->whenLoaded('berthContracts')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
