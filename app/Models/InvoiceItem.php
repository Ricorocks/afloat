<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceItem extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'vat_rate', 'quantity', 'amount'
    ];

    public function getSumAmountWithoutVatAttribute()
    {
        return $this->amount * $this->quantity;
    }

    public function getSumAmountWithVatAttribute()
    {
        return ($this->amount * (($this->vat_rate/100)+1) * $this->quantity);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
