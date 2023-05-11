<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BerthBookingResource\Pages;
use App\Filament\Resources\BerthBookingResource\RelationManagers;
use App\Models\BerthBooking;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BerthBookingResource extends Resource
{
    protected static ?string $model = BerthBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Bookings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('booked_at')
                    ->required(),
                Forms\Components\DatePicker::make('starts_at')
                    ->required(),
                Forms\Components\DatePicker::make('ends_at')
                    ->required(),
                Forms\Components\Select::make('berth_id')
                    ->relationship('berth', 'id')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('boat_id')
                    ->relationship('boat', 'name'),
                Forms\Components\Select::make('berth_booking_rate_id')
                    ->relationship('berthBookingRate', 'name'),
                Forms\Components\Select::make('invoice_item_id')
                    ->relationship('invoiceItem', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('booked_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('starts_at')
                    ->date(),
                Tables\Columns\TextColumn::make('ends_at')
                    ->date(),
                Tables\Columns\TextColumn::make('berth.id'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('boat.name'),
                Tables\Columns\TextColumn::make('berthBookingRate.name'),
                Tables\Columns\TextColumn::make('invoiceItem.name'),
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
            'index' => Pages\ListBerthBookings::route('/'),
            'create' => Pages\CreateBerthBooking::route('/create'),
            'edit' => Pages\EditBerthBooking::route('/{record}/edit'),
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
