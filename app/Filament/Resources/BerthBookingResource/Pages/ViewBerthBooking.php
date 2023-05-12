<?php

namespace App\Filament\Resources\BerthBookingResource\Pages;

use App\Filament\Resources\BerthBookingResource;
use App\Models\Berth;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBerthBooking extends ViewRecord
{
    protected static string $resource = BerthBookingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['marina'] = Berth::find($data['berth_id'])->marina->id;
    
        return $data;
    }
}
