<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Berth extends Model
{
    use HasFactory;

    protected $fillable = [
        'leg', 'berth_number', 'max_length_in_cm', 'max_width_in_cm',
        'max_draught_in_cm', 'marina_id', 'overlay_x', 'overlay_y',
        'overlay_rotate'
    ];

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }

    public function berthContracts(): HasMany 
    {
        return $this->hasMany(BerthContract::class);
    }

    
}
