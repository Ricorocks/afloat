<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Berth extends Model
{
    use HasFactory;

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }

    public function berthContracts(): HasMany 
    {
        return $this->hasMany(BerthContract::class);
    }
}
