<?php

namespace App\Filament\Resources\BoatResource\Pages;

use App\Filament\Resources\BoatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBoats extends ListRecords
{
    protected static string $resource = BoatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
