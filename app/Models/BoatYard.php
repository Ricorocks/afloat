<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoatYard extends Model
{
    use HasFactory, SoftDeletes;

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }


}

