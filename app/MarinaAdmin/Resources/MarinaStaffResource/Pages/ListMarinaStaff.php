<?php

namespace App\MarinaAdmin\Resources\MarinaStaffResource\Pages;

use App\MarinaAdmin\Resources\MarinaStaffResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class ListMarinaStaff extends ListRecords
{
    use ContextualResource;

    protected static string $resource = MarinaStaffResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
