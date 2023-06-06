<?php

namespace App\MarinaAdmin\Resources\KeyResource\Pages;

use App\MarinaAdmin\Resources\KeyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKey extends EditRecord
{
    protected static string $resource = KeyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
