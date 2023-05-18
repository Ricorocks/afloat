<?php

namespace App\Filament\Resources;

use App\Enums\Invoice\Status;
use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Invoices & Bookings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('issued_at')
                    ->required(),
                Forms\Components\DateTimePicker::make('cancelled_at'),
                Forms\Components\DateTimePicker::make('paid_at'),
                Forms\Components\DatePicker::make('due_at'),
                Forms\Components\Select::make('marina_id')
                    ->relationship('marina', 'name')
                    ->required(),
                Forms\Components\Select::make('marina_staff_id')
                    ->relationship('marinaStaff', 'name')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('boat_id')
                    ->relationship('boat', 'name'),
                Forms\Components\Select::make('boat_yard_id')
                    ->relationship('boatYard', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('total_without_vat')
                ->getStateUsing(function (Invoice $record): int {
                    return $record->sumWithoutVat;
                })->money('GBP'),
                Tables\Columns\TextColumn::make('total_with_vat')
                ->getStateUsing(function (Invoice $record): int {
                    return $record->sumWithVat;
                })->money('GBP'),
                Tables\Columns\TextColumn::make('issued_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('paid_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('cancelled_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('due_at')
                    ->date(),
                Tables\Columns\BadgeColumn::make('status')
                    ->enum([
                        Status::Draft->value => 'Draft',
                        Status::Open->value => 'Open',
                        Status::Paid->value => 'Paid',
                        Status::Void->value => 'Void',
                        Status::Uncollectible->value => 'Uncollectible',
                    ])
                    ->colors([
                        'secondary' => Status::Draft->value,
                        'primary' => Status::Open->value,
                        'success' => Status::Paid->value,
                        'secondary' => Status::Void->value,
                        'danger' => Status::Uncollectible->value,
                    ]),
                Tables\Columns\TextColumn::make('marina.name'),
                Tables\Columns\TextColumn::make('marinaStaff.name'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('boat.name'),
                Tables\Columns\TextColumn::make('boatYard.name'),
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
            RelationManagers\InvoiceItemsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
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
