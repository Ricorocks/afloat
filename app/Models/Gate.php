<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gate extends Model
{
    use HasFactory, SoftDeletes;

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }

    public function gateEvents(): HasMany
    {
        return $this->hasMany(GateEvent::class);
    }

}
