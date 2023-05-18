<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'line_1' => $this->line_1,
            'line_2' => $this->line_2,
            'city' => $this->city,
            'county' => $this->county,
            'country' => $this->country,
            'postcode' => $this->postcode,
            'alpha_two_code' => $this->alpha_two_code,
            'alpha_three_code' => $this->alpha_three_code,
            'location' => $this->location,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
