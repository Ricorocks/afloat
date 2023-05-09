<?php

namespace App\Filament\Resources\InvoiceResource\RelationManagers;

use App\Models\InvoiceItem;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'invoiceItems';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->label("Amount"),
                Forms\Components\TextInput::make('vat_rate')
                    ->required()
                    ->minValue(0)
                    ->maxValue(100),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->minValue(0)
                    ->maxValue(100)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('amount')
                ->money('GBP'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('sumAmountWithoutVat')
                ->getStateUsing(function (InvoiceItem $record): int {
                    return $record->sumAmountWithoutVat;
                })->money('GBP'),
                Tables\Columns\TextColumn::make('vat_rate'),
                Tables\Columns\TextColumn::make('sumAmountWithVat')
                ->getStateUsing(function (InvoiceItem $record): int {
                    return $record->sumAmountWithVat;
                })->money('GBP'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
