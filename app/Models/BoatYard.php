<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoatYard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'telephone_number', 'marina_id'
    ];

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }

    public function boatYardServices(): HasMany
    {
        return $this->hasMany(BoatYardService::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

}

