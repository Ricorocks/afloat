<?php

namespace App\MarinaAdmin\Resources\BoatYardResource\Pages;

use App\MarinaAdmin\Resources\BoatYardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBoatYards extends ListRecords
{
    protected static string $resource = BoatYardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
