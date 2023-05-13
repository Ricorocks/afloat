<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Address\Type;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static SpatialBuilder query()
 */
class Address extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => Type::class,
        'location' => Point::class,
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
