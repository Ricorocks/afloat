<?php

namespace App\MarinaAdmin\Resources\BerthResource\Pages;

use App\MarinaAdmin\Resources\BerthResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class EditBerth extends EditRecord
{
    use ContextualResource;
    
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
