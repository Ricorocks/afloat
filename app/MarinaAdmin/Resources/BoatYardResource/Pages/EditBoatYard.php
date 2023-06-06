<?php

namespace App\MarinaAdmin\Resources\BoatYardResource\Pages;

use App\MarinaAdmin\Resources\BoatYardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBoatYard extends EditRecord
{
    protected static string $resource = BoatYardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
