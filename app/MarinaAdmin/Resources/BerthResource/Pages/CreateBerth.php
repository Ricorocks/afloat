<?php

namespace App\MarinaAdmin\Resources\BerthResource\Pages;

use App\MarinaAdmin\Resources\BerthResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class CreateBerth extends CreateRecord
{
    use ContextualResource;
    
    protected static string $resource = BerthResource::class;
}
