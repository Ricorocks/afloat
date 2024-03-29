<?php

namespace App\Models;

use App\Enums\Invoice\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'status' => Status::class,
    ];

    public function subtotal(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->invoiceItems->sum('sumAmountWithoutVat')
        );
    }

    public function vatAmount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->invoiceItems->sum('sumAmountWithVat') - $this->invoiceItems->sum('sumAmountWithoutVat')
        );
    }

    public function getSumWithoutVatAttribute()
    {
        return $this->invoiceItems->sum('sumAmountWithoutVat');
    }

    public function getSumWithVatAttribute()
    {
        return $this->invoiceItems->sum('sumAmountWithVat');
    }

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
