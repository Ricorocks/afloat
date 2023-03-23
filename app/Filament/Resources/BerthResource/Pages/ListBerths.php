<?php

namespace App\Filament\Resources\BerthResource\Pages;

use App\Filament\Resources\BerthResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBerths extends ListRecords
{
    protected static string $resource = BerthResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
