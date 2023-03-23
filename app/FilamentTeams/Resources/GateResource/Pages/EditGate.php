<?php

namespace App\FilamentTeams\Resources\GateResource\Pages;

use App\FilamentTeams\Resources\GateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class EditGate extends EditRecord
{
    use ContextualResource;
    
    protected static string $resource = GateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
