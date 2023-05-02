<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }

    public function marinaStaff(): BelongsTo
    {
        return $this->belongsTo(MarinaStaff::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function boat(): BelongsTo
    {
        return $this->belongsTo(Boat::class);
    }

    public function boatYard(): BelongsTo
    {
        return $this->belongsTo(BoatYard::class);
    }

    public function invoiceItems(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
