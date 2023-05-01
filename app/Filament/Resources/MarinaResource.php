<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarinaResource\Pages;
use App\Filament\Resources\MarinaResource\RelationManagers;
use App\Models\Marina;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarinaResource extends Resource
{
    protected static ?string $model = Marina::class;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    protected static ?string $navigationGroup = 'Marina Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('address_line_1')
                    ->required(),
                Forms\Components\TextInput::make('address_line_2'),
                Forms\Components\TextInput::make('city')
                    ->required(),
                Forms\Components\TextInput::make('county'),
                Forms\Components\TextInput::make('postcode')
                    ->required(),
                Forms\Components\TextInput::make('country')
                    ->required(),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('website')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('vhf_channel')
                    ->required(),
                Forms\Components\TextInput::make('lattitude')
                    ->required(),
                Forms\Components\TextInput::make('longitude')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('address_line_1'),
                Tables\Columns\TextColumn::make('address_line_2'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('county'),
                Tables\Columns\TextColumn::make('postcode'),
                Tables\Columns\TextColumn::make('country'),
                Tables\Columns\TextColumn::make('phone_number'),
                Tables\Columns\TextColumn::make('website'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('vhf_channel'),
                Tables\Columns\TextColumn::make('lattitude'),
                Tables\Columns\TextColumn::make('longitude'),
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
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\GatesRelationManager::class,
            RelationManagers\BoatYardRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMarinas::route('/'),
            'create' => Pages\CreateMarina::route('/create'),
            'view' => Pages\ViewMarina::route('/{record}'),
            'edit' => Pages\EditMarina::route('/{record}/edit'),
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
