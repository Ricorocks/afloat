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
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'location', 'marina_id'
    ];

    public function getNextEventLabelAttribute()
    {
        $event = $this->gateEvents()
            ->where('happens_at', '>', now())
            ->orderBy('happens_at')
            ->limit(1)
            ->first();
            
        if(!$event)
        {
            return "No Future Events";
        }
        return str($event->label)->append(' at ')->append($event->happens_at->format('d/m/Y H:i'));
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
