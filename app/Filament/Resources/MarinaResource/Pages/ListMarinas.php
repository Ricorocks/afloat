<?php

namespace App\Filament\Resources\MarinaResource\Pages;

use App\Filament\Resources\MarinaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMarinas extends ListRecords
{
    protected static string $resource = MarinaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
