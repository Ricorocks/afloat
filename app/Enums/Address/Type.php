<?php

namespace App\Enums\Address;

enum Type: int
{
    case Location = 1;
    case Billing = 2;
}
