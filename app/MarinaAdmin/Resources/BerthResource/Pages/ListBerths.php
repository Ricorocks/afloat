<?php

namespace App\MarinaAdmin\Resources\BerthResource\Pages;

use App\MarinaAdmin\Resources\BerthResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class ListBerths extends ListRecords
{
    use ContextualResource;

    protected static string $resource = BerthResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
