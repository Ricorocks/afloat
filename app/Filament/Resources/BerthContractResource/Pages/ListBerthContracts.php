<?php

namespace App\Filament\Resources\BerthContractResource\Pages;

use App\Filament\Resources\BerthContractResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBerthContracts extends ListRecords
{
    protected static string $resource = BerthContractResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
