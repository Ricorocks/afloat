<?php

namespace App\MarinaAdmin\Resources\VehicleResource\Pages;

use App\MarinaAdmin\Resources\VehicleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVehicles extends ListRecords
{
    protected static string $resource = VehicleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
