<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Node\Stmt\Return_;

class BoatYardService extends Model
{
    use HasFactory;

    public function boatYard(): BelongsTo
    {
        return $this->belongsTo(BoatYard::class);
    }
}
