<?php

namespace App\MarinaAdmin\Resources\MarinaStaffResource\Pages;

use App\MarinaAdmin\Resources\MarinaStaffResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class EditMarinaStaff extends EditRecord
{
    use ContextualResource;
    
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
