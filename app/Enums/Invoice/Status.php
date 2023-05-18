<?php

namespace App\Enums\Invoice;

enum Status: int
{
    case Draft = 1;
    case Open = 2;
    case Paid = 3;
    case Void = 4;
    case Uncollectible = 5;

    public function label(): string
    {
        return match($this) {
            static::Draft => 'Draft',
            static::Open => 'Open',
            static::Paid => 'Paid',
            static::Void => 'Void',
            static::Uncollectible => 'Uncollectible',
            default => 'Draft'
        };
    }
}
