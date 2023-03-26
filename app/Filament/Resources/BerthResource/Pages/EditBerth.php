<?php

namespace App\Filament\Resources\BerthResource\Pages;

use App\Filament\Resources\BerthResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerth extends EditRecord
{
    protected static string $resource = BerthResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
