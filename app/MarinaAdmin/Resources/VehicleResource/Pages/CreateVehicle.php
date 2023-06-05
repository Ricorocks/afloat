<?php

namespace App\MarinaAdmin\Resources\VehicleResource\Pages;

use App\MarinaAdmin\Resources\VehicleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVehicle extends CreateRecord
{
    protected static string $resource = VehicleResource::class;
}
