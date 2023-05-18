<?php

namespace App\Filament\Resources\BoatYardResource\Pages;

use App\Filament\Resources\BoatYardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBoatYard extends ViewRecord
{
    protected static string $resource = BoatYardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
