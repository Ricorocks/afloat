<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\MarinaResource;
use App\Http\Resources\Customer\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class KeyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'user' => UserResource::make($this->whenLoaded('user')),
            'marina' => MarinaResource::make($this->whenLoaded('marina')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
