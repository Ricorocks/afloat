<?php

namespace App\MarinaAdmin\Resources\TideResource\Pages;

use App\MarinaAdmin\Resources\TideResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTides extends ListRecords
{
    protected static string $resource = TideResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
