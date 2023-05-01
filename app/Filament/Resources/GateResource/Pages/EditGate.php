<?php

namespace App\Filament\Resources\GateResource\Pages;

use App\Filament\Resources\GateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGate extends EditRecord
{
    protected static string $resource = GateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
