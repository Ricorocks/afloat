<?php

namespace App\MarinaAdmin\Resources\TideResource\Pages;

use App\MarinaAdmin\Resources\TideResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTide extends CreateRecord
{
    protected static string $resource = TideResource::class;
}
