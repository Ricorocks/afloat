<?php

namespace App\Filament\Resources\GateResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class GateEventsRelationManager extends RelationManager
{
    protected static string $relationship = 'gateEvents';

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('label')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('happens_at')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label'),
                Tables\Columns\TextColumn::make('happens_at')->label('Date')
                    ->dateTime('d/m/y')->sortable(),
                Tables\Columns\TextColumn::make('happens_at_time')->label('Time')
                    ->getStateUsing(function (Model $record): string {
                        return $record->happens_at->format('H:i');
                    }),
            ])
            ->filters([
                Filter::make('happens_at')
                ->form([
                    Forms\Components\DatePicker::make('happens_at'),
                ])->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['happens_at'],
                            fn (Builder $query, $date): Builder => $query->whereDate('happens_at', '=', Carbon::create($data['happens_at'])->format('Y-m-d')),
                        );
                })
                
                
                //->query(fn (Builder $query, array $data): Builder => $query->whereDate('happens_at', '=', $data['happens_at']))
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
