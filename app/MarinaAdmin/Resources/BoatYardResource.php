<?php

namespace App\MarinaAdmin\Resources;

use App\MarinaAdmin\Resources\BoatYardResource\Pages;
use App\MarinaAdmin\Resources\BoatYardResource\RelationManagers;
use App\Models\BoatYard;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class BoatYardResource extends Resource
{
    use ContextualResource;

    protected static ?string $model = BoatYard::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation';

    protected static ?string $navigationGroup = 'Marina Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('telephone_number')
                    ->tel()
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
                Tables\Columns\TextColumn::make('telephone_number'),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('marina')
                    ->relationship('marina', 'name'),
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
            RelationManagers\BoatYardServicesRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBoatYards::route('/'),
            'create' => Pages\CreateBoatYard::route('/create'),
            'edit' => Pages\EditBoatYard::route('/{record}/edit'),
            'view' => Pages\ViewBoatYard::route('/{record}'),
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
