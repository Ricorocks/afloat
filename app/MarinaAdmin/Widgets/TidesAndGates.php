<?php

namespace App\MarinaAdmin\Widgets;

use App\Models\BerthBooking;
use App\Models\Marina;
use App\Models\Tide;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class TidesAndGates extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        return Tide::query()
            ->whereDate('happens_at', '>=', now())
            ->where('marina_id', auth()->user()->current_marina)
            ->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('happens_at')->date('d/m/Y'),
        ];
    }
}