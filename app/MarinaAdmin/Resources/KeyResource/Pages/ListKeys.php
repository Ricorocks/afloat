<?php

namespace App\MarinaAdmin\Resources\KeyResource\Pages;

use App\MarinaAdmin\Resources\KeyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeys extends ListRecords
{
    protected static string $resource = KeyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
