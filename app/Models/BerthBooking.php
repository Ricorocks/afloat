<?php

namespace App\Models;

use App\Models\Berth;
use App\Models\User;
use App\Models\Boat;
use App\Models\BerthBookingRate;
use App\Models\InvoiceItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BerthBooking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'starts_at', 'ends_at', 'berth_id', 
        'user_id', 'boat_id', 'booking_rate_id'
    ];

    public function berth(): BelongsTo
    {
        return $this->belongsTo(Berth::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function boat(): BelongsTo
    {
        return $this->belongsTo(Boat::class);
    }

    public function berthBookingRate(): BelongsTo
    {
        return $this->belongsTo(BerthBookingRate::class);
    }

    public function invoiceItem(): BelongsTo
    {
        return $this->belongsTo(InvoiceItem::class);
    }
}
