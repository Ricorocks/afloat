<?php

namespace App\MarinaAdmin\Resources;

use App\MarinaAdmin\Resources\GateEventResource\Pages;
use App\MarinaAdmin\Resources\GateEventResource\RelationManagers;
use App\Models\GateEvent;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Iotronlab\FilamentMultiGuard\Concerns\ContextualResource;

class GateEventResource extends Resource
{
    use ContextualResource;

    protected static ?string $model = GateEvent::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Gates & Tides';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('label')
                    ->required(),
                Forms\Components\DateTimePicker::make('happens_at')
                    ->required(),
                Forms\Components\Select::make('gate_id')
                    ->relationship('gate', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label'),
                Tables\Columns\TextColumn::make('happens_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('gate.name'),
                Tables\Columns\TextColumn::make('gate.marina.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGateEvents::route('/'),
        ];
    }  
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('marina_id', auth()->user()->current_marina);
    }
}
