<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boat extends Model
{
    use HasFactory, SoftDeletes;

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function berthContracts(): HasMany
    {
        return $this->hasMany(BerthContract::class);
    }
}
