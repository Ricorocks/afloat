<?php

namespace App\Filament\Resources\MarinaResource\Pages;

use App\Filament\Resources\MarinaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMarina extends EditRecord
{
    protected static string $resource = MarinaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
