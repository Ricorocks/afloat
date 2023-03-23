<?php

namespace App\FilamentTeams\Resources\GateResource\Pages;

use App\FilamentTeams\Resources\GateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class ListGates extends ListRecords
{
    use ContextualResource;
    
    protected static string $resource = GateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}       
