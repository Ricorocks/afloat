<?php

namespace App\Filament\Resources\BerthBookingRateResource\Pages;

use App\Filament\Resources\BerthBookingRateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBerthBookingRates extends ListRecords
{
    protected static string $resource = BerthBookingRateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
