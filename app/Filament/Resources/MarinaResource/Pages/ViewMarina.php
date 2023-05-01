<?php

namespace App\Filament\Resources\MarinaResource\Pages;

use App\Filament\Resources\MarinaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMarina extends ViewRecord
{
    protected static string $resource = MarinaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
