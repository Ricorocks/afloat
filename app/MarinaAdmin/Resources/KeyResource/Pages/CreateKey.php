<?php

namespace App\MarinaAdmin\Resources\KeyResource\Pages;

use App\MarinaAdmin\Resources\KeyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKey extends CreateRecord
{
    protected static string $resource = KeyResource::class;
}
