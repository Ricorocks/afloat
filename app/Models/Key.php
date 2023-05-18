<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Key extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'marina_id', 'user_id'
    ];

    public function marina(): BelongsTo
    {
        return $this->belongsTo(Marina::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
