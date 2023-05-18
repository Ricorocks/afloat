<?php

namespace App\Http\Resources\Customer;

use App\Http\Resources\AddressResource;
use App\Http\Resources\BerthContractResource;
use App\Http\Resources\KeyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'telephone_number' => $this->telephone_number,
            'email_verified_at' => $this->email_verified_at,
            'email_verified_at' => $this->email_verified_at,
            'boats' => BoatResource::collection($this->whenLoaded('boats')),
            'vehicles' => VehicleResource::collection($this->whenLoaded('vehicles')),
            'keys' => KeyResource::collection($this->whenLoaded('keys')),
            'berth_contracts' => BerthContractResource::collection($this->whenLoaded('berthContracts')),
            'invoices' => InvoiceResource::collection($this->whenLoaded('invoices')),
            'address' => AddressResource::make($this->whenLoaded('address')),
            'billing_address' => AddressResource::make($this->whenLoaded('billingAddress')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
