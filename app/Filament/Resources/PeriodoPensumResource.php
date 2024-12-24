<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodoPensumResource\Pages;
use App\Filament\Resources\PeriodoPensumResource\RelationManagers;
use App\Models\PeriodoPensum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class PeriodoPensumResource extends Resource
{
    protected static ?string $model = PeriodoPensum::class;

    protected static ?string $navigationGroup = 'Académicos';

    protected static ?int $navigationSort = 8;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('DesTipPeriodos')
                    ->label('Descripción del Periodo Pensum')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('NumMes')
                    ->label('Número de meses')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('DesTipPeriodos')
                    ->label('Descripción del Periodo Pensum')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('NumMes')
                    ->label('Número de meses')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado el')
		            ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ], position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPeriodoPensums::route('/'),
            'create' => Pages\CreatePeriodoPensum::route('/create'),
            'edit' => Pages\EditPeriodoPensum::route('/{record}/edit'),
        ];
    }
}
