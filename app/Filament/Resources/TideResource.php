<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TideResource\Pages;
use App\Filament\Resources\TideResource\RelationManagers;
use App\Models\Tide;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TideResource extends Resource
{
    protected static ?string $model = Tide::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('marina_id')
                    ->relationship('marina', 'name')
                    ->required(),
                Forms\Components\TextInput::make('height')
                    ->required(),
                Forms\Components\DateTimePicker::make('tide_at')
                    ->required(),
                Forms\Components\TextInput::make('type')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('marina.name'),
                Tables\Columns\TextColumn::make('height'),
                Tables\Columns\TextColumn::make('tide_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
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
}
