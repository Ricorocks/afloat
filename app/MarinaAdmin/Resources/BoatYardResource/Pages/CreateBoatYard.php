<?php

namespace App\MarinaAdmin\Resources\BoatYardResource\Pages;

use App\MarinaAdmin\Resources\BoatYardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBoatYard extends CreateRecord
{
    protected static string $resource = BoatYardResource::class;
}
