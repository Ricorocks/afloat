<?php

namespace App\Filament\Resources\GateEventResource\Pages;

use App\Filament\Resources\GateEventResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGateEvents extends ManageRecords
{
    protected static string $resource = GateEventResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
