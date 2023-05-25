<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPUnit\Framework\isNull;

class Gate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'location', 'marina_id'
    ];

    public function getNextEventLabelAttribute()
    {
        $firstEvent = $this->gateEvents()
            ->where('happens_at', '>', now())
            ->orderBy('happens_at')
            ->limit(1)
            ->first();

        return $firstEvent ? str($firstEvent->label)->append(' at ')->append($firstEvent->happens_at->format('d/m/Y H:i')) : "No Future Events";
    }

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }

    public function gateEvents(): HasMany
    {
        return $this->hasMany(GateEvent::class);
    }


}
