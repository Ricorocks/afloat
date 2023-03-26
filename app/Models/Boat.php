<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'length_in_cm', 'width_in_cm', 'draught_in_cm'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function berthContracts(): HasMany
    {
        return $this->hasMany(BerthContract::class);
    }

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }
}
