<?php

namespace App\Filament\Widgets;

use App\Models\BerthBooking;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class ConfirmedBookings extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        return BerthBooking::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('starts_at')->date(),
            Tables\Columns\TextColumn::make('nights'),
            Tables\Columns\TextColumn::make('boat.name'),
            Tables\Columns\TextColumn::make('boat.length_in_cm')
                ->label('Length'),
            Tables\Columns\TextColumn::make('totalPrice')->money('GBP'),
            Tables\Columns\TextColumn::make('berth.id'),
        ];
    }
}
