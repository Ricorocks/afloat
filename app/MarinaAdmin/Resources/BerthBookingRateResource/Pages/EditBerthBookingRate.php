<?php

namespace App\MarinaAdmin\Resources\BerthBookingRateResource\Pages;

use App\MarinaAdmin\Resources\BerthBookingRateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerthBookingRate extends EditRecord
{
    protected static string $resource = BerthBookingRateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
