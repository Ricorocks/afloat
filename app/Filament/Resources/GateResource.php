<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GateResource\Pages;
use App\Filament\Resources\GateResource\RelationManagers;
use App\Models\Gate;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GateResource extends Resource
{
    protected static ?string $model = Gate::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Gates';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('location')
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
                Tables\Columns\TextColumn::make('name')->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('marina.name')->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('last_updated')
                    ->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\GateEventsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGates::route('/'),
            'create' => Pages\CreateGate::route('/create'),
            'view' => Pages\ViewGate::route('/{record}'),
            'edit' => Pages\EditGate::route('/{record}/edit'),
        ];
    }

    protected function shouldPersistTableSortInSession(): bool
    {
        return true;
    }
}
