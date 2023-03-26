<?php

namespace App\Filament\Resources\MarinaStaffResource\Pages;

use App\Filament\Resources\MarinaStaffResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMarinaStaff extends ListRecords
{
    protected static string $resource = MarinaStaffResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
