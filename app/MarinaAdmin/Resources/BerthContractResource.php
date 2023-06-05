<?php

namespace App\MarinaAdmin\Resources;

use App\MarinaAdmin\Resources\BerthContractResource\Pages;
use App\MarinaAdmin\Resources\BerthContractResource\RelationManagers;
use App\Models\BerthContract;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class BerthContractResource extends Resource
{
    use ContextualResource;

    protected static ?string $model = BerthContract::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Marina Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('berth_id')
                    ->relationship('berth', 'id')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('boat_id')
                    ->relationship('boat', 'name')
                    ->required(),
                Forms\Components\DatePicker::make('starts_at')
                    ->required(),
                Forms\Components\DatePicker::make('ends_at')
                    ->required(),
                Forms\Components\TextInput::make('notes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('berth.id'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('boat.name'),
                Tables\Columns\TextColumn::make('starts_at')
                    ->date(),
                Tables\Columns\TextColumn::make('ends_at')
                    ->date(),
                Tables\Columns\TextColumn::make('notes'),
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
            'index' => Pages\ListBerthContracts::route('/'),
            'create' => Pages\CreateBerthContract::route('/create'),
            'edit' => Pages\EditBerthContract::route('/{record}/edit'),
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
