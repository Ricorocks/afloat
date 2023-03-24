<?php

namespace App\MarinaAdmin\Resources\MarinaStaffResource\Pages;

use App\MarinaAdmin\Resources\MarinaStaffResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class CreateMarinaStaff extends CreateRecord
{
    use ContextualResource;
    
    protected static string $resource = MarinaStaffResource::class;
}
