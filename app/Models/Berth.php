<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Berth extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'leg', 'berth_number', 'max_length_in_cm', 'max_width_in_cm',
        'max_draught_in_cm', 'marina_id', 'overlay_x', 'overlay_y',
        'overlay_rotate'
    ];

    public function getActiveContractAttribute(): bool
    {
        return $this->berthContracts->count() > 0 ? true : false; 
    }

    public function getLocationAttribute(): string
    {
        return Str::of($this->leg)
            ->append(' ')
            ->append($this->berth_number);
    }

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }

    public function berthContracts(): HasMany 
    {
        return $this->hasMany(BerthContract::class);
    }

    
}
