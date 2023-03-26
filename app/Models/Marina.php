<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marina extends Model
{
    use HasFactory, SoftDeletes;

    public function berths(): HasMany
    {
        return $this->hasMany(Berth::class);
    }

    public function gates(): HasMany
    {
        return $this->hasMany(Gate::class);
    }

    public function keys(): HasMany
    {
        return $this->hasMany(Key::class);
    }

    public function berthContracts(): HasManyThrough
    {
        return $this->hasManyThrough(BerthContract::class, Berth::class);
    }

    public function boats(): HasMany
    {
        return $this->hasMany(Boats::class);
    }

    public function boatYard(): HasOne
    {
        return $this->hasone(BoatYard::class);
    }

}
