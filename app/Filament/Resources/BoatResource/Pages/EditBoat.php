<?php

namespace App\Filament\Resources\BoatResource\Pages;

use App\Filament\Resources\BoatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBoat extends EditRecord
{
    protected static string $resource = BoatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
