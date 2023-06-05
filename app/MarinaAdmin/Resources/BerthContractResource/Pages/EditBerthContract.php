<?php

namespace App\MarinaAdmin\Resources\BerthContractResource\Pages;

use App\MarinaAdmin\Resources\BerthContractResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerthContract extends EditRecord
{
    protected static string $resource = BerthContractResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
