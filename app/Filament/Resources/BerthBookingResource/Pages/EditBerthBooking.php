<?php

namespace App\Filament\Resources\BerthBookingResource\Pages;

use App\Filament\Resources\BerthBookingResource;
use App\Models\Berth;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerthBooking extends EditRecord
{
    protected static string $resource = BerthBookingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['marina'] = Berth::find($data['berth_id'])->marina->id;
    
        return $data;
    }
}
