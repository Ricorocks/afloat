<?php

namespace App\MarinaAdmin\Resources\InvoiceResource\Pages;

use App\MarinaAdmin\Resources\InvoiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;
}
