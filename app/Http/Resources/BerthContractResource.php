<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\Customer\BoatResource;
use App\Http\Resources\Customer\UserResource;
use App\Http\Resources\Customer\BerthResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BerthContractResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'starts_at' => $this->starts_at,
            'ends_at' => $this->ends_at,
            'berth' => BerthResource::make($this->whenLoaded('berth')),
            'user' => UserResource::make($this->whenLoaded('user')),
            'boat' => BoatResource::make($this->whenLoaded('boat')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
