<?php

namespace App\Concerns;

use App\Models\Address;
use App\Enums\Address\Type;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasAddress
{
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')->where('type', Type::Location->value);
    }

    public function billingAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')->where('type', Type::Billing->value);
    }
}
