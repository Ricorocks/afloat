<?php

namespace App\FilamentTeams\Resources\BerthResource\Pages;

use App\FilamentTeams\Resources\BerthResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class CreateBerth extends CreateRecord
{
    use ContextualResource;
    
    protected static string $resource = BerthResource::class;
}
