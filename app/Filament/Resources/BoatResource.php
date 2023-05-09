<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoatResource\Pages;
use App\Filament\Resources\BoatResource\RelationManagers;
use App\Models\Boat;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BoatResource extends Resource
{
    protected static ?string $model = Boat::class;

    protected static ?string $navigationIcon = 'heroicon-o-support';

    protected static ?string $navigationGroup = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('make'),
                Forms\Components\TextInput::make('length_in_cm')
                    ->required(),
                Forms\Components\TextInput::make('width_in_cm')
                    ->required(),
                Forms\Components\TextInput::make('draught_in_cm')
                    ->required(),
                Forms\Components\TextInput::make('type'),
                Forms\Components\DatePicker::make('date_of_construction'),
                Forms\Components\TextInput::make('insurance_number'),
                Forms\Components\TextInput::make('user_id')
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
                Tables\Columns\TextColumn::make('make'),
                Tables\Columns\TextColumn::make('length_in_cm'),
                Tables\Columns\TextColumn::make('width_in_cm'),
                Tables\Columns\TextColumn::make('draught_in_cm'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('date_of_construction')
                    ->date(),
                Tables\Columns\TextColumn::make('insurance_number'),
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('marina.name'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListBoats::route('/'),
            'create' => Pages\CreateBoat::route('/create'),
            'edit' => Pages\EditBoat::route('/{record}/edit'),
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
