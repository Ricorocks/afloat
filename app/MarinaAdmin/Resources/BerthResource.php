<?php

namespace App\MarinaAdmin\Resources;

use App\MarinaAdmin\Resources\BerthResource\Pages;
use App\MarinaAdmin\Resources\BerthResource\RelationManagers;
use App\Models\Berth;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class BerthResource extends Resource
{
    use ContextualResource;
    
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
                Tables\Columns\TextColumn::make('leg'),
                Tables\Columns\TextColumn::make('berth_number'),
                Tables\Columns\TextColumn::make('internal_id'),
                Tables\Columns\TextColumn::make('max_length_in_cm'),
                Tables\Columns\TextColumn::make('max_width_in_cm'),
                Tables\Columns\TextColumn::make('max_draught_in_cm'),
                Tables\Columns\TextColumn::make('overlay_x'),
                Tables\Columns\TextColumn::make('overlay_y'),
                Tables\Columns\TextColumn::make('overlay_rotate'),
                Tables\Columns\TextColumn::make('marina.name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
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
            ])->where('marina_id', auth()->user()->current_marina);
    }
}
