<?php

namespace App\MarinaAdmin\Resources;

use App\MarinaAdmin\Resources\TideResource\Pages;
use App\MarinaAdmin\Resources\TideResource\RelationManagers;
use App\Models\Tide;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class TideResource extends Resource
{
    use ContextualResource;

    protected static ?string $model = Tide::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    protected static ?string $navigationGroup = 'Gates & Tides';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('marina_id')
                    ->relationship('marina', 'name')
                    ->required(),
                Forms\Components\TextInput::make('height')
                    ->required(),
                Forms\Components\DateTimePicker::make('happens_at')
                    ->required(),
                Forms\Components\TextInput::make('type')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('height'),
                Tables\Columns\TextColumn::make('happens_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('type'),
            ])
            ->filters([
  
                // Filter::make('happens_at')
                // ->form([
                //     Forms\Components\DatePicker::make('happens_at_from'),
                //     Forms\Components\DatePicker::make('happens_at_until'),
                // ])
                // ->query(function (Builder $query, array $data): Builder {
                //     return $query
                //         ->when(
                //             $data['happens_at_from'],
                //             fn (Builder $query, $date): Builder => $query->whereDate('happens_at', '>=', $date),
                //         )
                //         ->when(
                //             $data['happens_at_until'],
                //             fn (Builder $query, $date): Builder => $query->whereDate('happens_at', '<=', $date),
                //         );
                // })

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTides::route('/'),
            'create' => Pages\CreateTide::route('/create'),
            'edit' => Pages\EditTide::route('/{record}/edit'),
        ];
    }    

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
        ->where('marina_id', auth()->user()->current_marina);
    }
}
