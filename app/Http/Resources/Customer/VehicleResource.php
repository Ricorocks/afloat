<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use App\Http\Resources\Customer\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'registration' => $this->registration,
            'vin' => $this->vin,
            'color' => $this->color,
            'make' => $this->make,
            'model' => $this->model,
            'fuel_type' => $this->fuel_type,
            'primary_image' => $this->primary_image,
            'co2_emissions' => $this->co2_emissions,
            'engine_capacity' => $this->engine_capacity,
            'registered_on' => $this->registered_on,
            'mot_due_on' => $this->mot_due_on,
            'insurance_renews_on' => $this->insurance_renews_on,
            'congestion_charge_renews_on' => $this->congestion_charge_renews_on,
            'user' => UserResource::make($this->whenLoaded('user')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
