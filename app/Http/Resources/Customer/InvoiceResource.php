<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use App\Http\Resources\BoatYard;
use App\Http\Resources\MarinaResource;
use App\Http\Resources\MarinaStaffResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Customer\InvoiceItemResource;

class InvoiceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'issued_at' => $this->issued_at,
            'cancelled_at' => $this->cancelled_at,
            'paid_at' => $this->paid_at,
            'due_at' => $this->due_at,
            'currency' => 'GBP',
            'subtotal' => $this->subtotal,
            'vat_amount' => $this->vat_amount,
            'sum_without_vat' => $this->sum_without_vat,
            'sum_with_vat' => $this->sum_with_vat,
            'status' => $this->status,
            'marina' => MarinaResource::make($this->whenLoaded('marina')),
            'marina_staff' => MarinaStaffResource::make($this->whenLoaded('marinaStaff')),
            'user' => UserResource::make($this->whenLoaded('user')),
            'boat' => BoatResource::make($this->whenLoaded('boat')),
            'boat_yard' => BoatYard::make($this->whenLoaded('boatYard')),
            'invoice_items' => InvoiceItemResource::collection($this->whenLoaded('invoiceItems')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
