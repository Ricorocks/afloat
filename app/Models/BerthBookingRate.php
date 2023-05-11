<?php

namespace App\Models;

use App\Models\Marina;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BerthBookingRate extends Model
{
    use HasFactory, SoftDeletes;

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }
}
