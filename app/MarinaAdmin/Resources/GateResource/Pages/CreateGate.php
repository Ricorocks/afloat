<?php

namespace App\MarinaAdmin\Resources\GateResource\Pages;

use App\MarinaAdmin\Resources\GateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class CreateGate extends CreateRecord
{
    use ContextualResource;
    
    protected static string $resource = GateResource::class;
}
