<?php

namespace App\MarinaAdmin\Resources\BerthBookingResource\Pages;

use App\MarinaAdmin\Resources\BerthBookingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBerthBookings extends ListRecords
{
    protected static string $resource = BerthBookingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
