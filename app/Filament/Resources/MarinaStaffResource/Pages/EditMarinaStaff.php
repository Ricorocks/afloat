<?php

namespace App\Filament\Resources\MarinaStaffResource\Pages;

use App\Filament\Resources\MarinaStaffResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMarinaStaff extends EditRecord
{
    protected static string $resource = MarinaStaffResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
