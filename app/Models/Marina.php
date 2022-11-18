<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Marina extends Model
{
    use HasFactory;

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
}
