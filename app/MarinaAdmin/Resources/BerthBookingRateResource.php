<?php

namespace App\MarinaAdmin\Resources;

use App\MarinaAdmin\Resources\BerthBookingRateResource\Pages;
use App\MarinaAdmin\Resources\BerthBookingRateResource\RelationManagers;
use App\Models\BerthBookingRate;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class BerthBookingRateResource extends Resource
{
    use ContextualResource;

    protected static ?string $model = BerthBookingRate::class;

    protected static ?string $navigationIcon = 'heroicon-o-cash';

    protected static ?string $navigationGroup = 'Bookings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\DatePicker::make('starts_at')
                    ->required(),
                Forms\Components\DatePicker::make('ends_at')
                    ->required(),
                Forms\Components\TextInput::make('max_length_in_cm')
                    ->required(),
                Forms\Components\TextInput::make('min_length_in_cm')
                    ->required(),
                Forms\Components\TextInput::make('day_rate_per_meter')
                    ->required(),
                Forms\Components\TextInput::make('currency')
                    ->required(),
                Forms\Components\Select::make('marina_id')
                    ->relationship('marina', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('starts_at')
                    ->date(),
                Tables\Columns\TextColumn::make('ends_at')
                    ->date(),
                Tables\Columns\TextColumn::make('max_length_in_cm'),
                Tables\Columns\TextColumn::make('min_length_in_cm'),
                Tables\Columns\TextColumn::make('day_rate_per_meter'),
                Tables\Columns\TextColumn::make('currency'),
                Tables\Columns\TextColumn::make('marina.id'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListBerthBookingRates::route('/'),
            'create' => Pages\CreateBerthBookingRate::route('/create'),
            'edit' => Pages\EditBerthBookingRate::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])->where('marina_id', auth()->user()->current_marina);
    }
}
