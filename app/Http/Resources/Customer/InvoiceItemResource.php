<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'vat_rate' => $this->vat_rate,
            'quantity' => $this->quantity,
            'sum_amount_with_vat' => $this->sum_with_vat,
            'sum_amount_without_vat' => $this->sum_without_vat,
            'invoice' => $this->whenLoaded('invoice'),
            'boat_yard' => $this->whenLoaded('boatYard'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
