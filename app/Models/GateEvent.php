<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GateEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'label', 'happens_at'
    ];

    protected $casts = [
        'happens_at' => 'datetime'
    ];

    public function gate(): BelongsTo
    {
        return $this->belongsTo(Gate::class);
    }

    public function scopeNextEvents($query, $count): Builder
    {
        return $query->whereDate('happens_at', '>=', now())->orderBy('happens_at')->limit($count);
    }
}
