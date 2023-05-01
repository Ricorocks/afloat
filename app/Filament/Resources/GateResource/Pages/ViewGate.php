<?php

namespace App\Filament\Resources\GateResource\Pages;

use App\Filament\Resources\GateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGate extends ViewRecord
{
    protected static string $resource = GateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
