<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BerthResource\Pages;
use App\Filament\Resources\BerthResource\RelationManagers;
use App\Models\Berth;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BerthResource extends Resource
{
    protected static ?string $model = Berth::class;

    protected static ?string $navigationIcon = 'heroicon-o-location-marker';

    protected static ?string $navigationGroup = 'Marina Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('leg')
                    ->required(),
                Forms\Components\TextInput::make('berth_number')
                    ->required(),
                Forms\Components\TextInput::make('internal_id'),
                Forms\Components\TextInput::make('max_length_in_cm')
                    ->required(),
                Forms\Components\TextInput::make('max_width_in_cm')
                    ->required(),
                Forms\Components\TextInput::make('max_draught_in_cm')
                    ->required(),
                Forms\Components\TextInput::make('overlay_x')
                    ->required(),
                Forms\Components\TextInput::make('overlay_y')
                    ->required(),
                Forms\Components\TextInput::make('overlay_rotate')
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
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('internal_id'),
                Tables\Columns\TextColumn::make('max_length_in_cm')
                    ->label('Max length'),
                Tables\Columns\TextColumn::make('max_width_in_cm')
                    ->label('Max width'),
                Tables\Columns\TextColumn::make('max_draught_in_cm')
                    ->label('Max draught'),
                Tables\Columns\TextColumn::make('marina.name'),
                Tables\Columns\IconColumn::make('activeContract')
                    ->options([
                        'heroicon-o-x-circle' => false,
                        'heroicon-o-check-circle' => true,
                    ])
                    ->colors([
                        'warning' => false,
                        'success' => true,
                    ]),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('marina')
                    ->relationship('marina', 'name'),
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
            'index' => Pages\ListBerths::route('/'),
            'create' => Pages\CreateBerth::route('/create'),
            'edit' => Pages\EditBerth::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
