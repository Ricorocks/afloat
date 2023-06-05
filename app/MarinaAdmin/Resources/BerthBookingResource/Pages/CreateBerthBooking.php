<?php

namespace App\MarinaAdmin\Resources\BerthBookingResource\Pages;

use App\MarinaAdmin\Resources\BerthBookingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBerthBooking extends CreateRecord
{
    protected static string $resource = BerthBookingResource::class;
}
