<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleResource\Pages;
use App\Filament\Resources\VehicleResource\RelationManagers;
use App\Models\Vehicle;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Marina Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('registration')
                    ->required(),
                Forms\Components\TextInput::make('vin'),
                Forms\Components\TextInput::make('color'),
                Forms\Components\TextInput::make('make'),
                Forms\Components\TextInput::make('model'),
                Forms\Components\TextInput::make('fuel_type'),
                Forms\Components\TextInput::make('primary_image_url'),
                Forms\Components\TextInput::make('co2_emissions'),
                Forms\Components\TextInput::make('engine_capacity'),
                Forms\Components\DatePicker::make('registered_on'),
                Forms\Components\DatePicker::make('mot_due_on'),
                Forms\Components\DatePicker::make('tax_due_on'),
                Forms\Components\DatePicker::make('insurance_renews_on'),
                Forms\Components\DatePicker::make('congestion_charge_renews_on'),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration'),
                Tables\Columns\TextColumn::make('vin'),
                Tables\Columns\TextColumn::make('color'),
                Tables\Columns\TextColumn::make('make'),
                Tables\Columns\TextColumn::make('model'),
                Tables\Columns\TextColumn::make('fuel_type'),
                Tables\Columns\TextColumn::make('primary_image_url'),
                Tables\Columns\TextColumn::make('co2_emissions'),
                Tables\Columns\TextColumn::make('engine_capacity'),
                Tables\Columns\TextColumn::make('registered_on')
                    ->date(),
                Tables\Columns\TextColumn::make('mot_due_on')
                    ->date(),
                Tables\Columns\TextColumn::make('tax_due_on')
                    ->date(),
                Tables\Columns\TextColumn::make('insurance_renews_on')
                    ->date(),
                Tables\Columns\TextColumn::make('congestion_charge_renews_on')
                    ->date(),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
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
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }    
}
