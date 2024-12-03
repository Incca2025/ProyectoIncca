<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PensumResource\Pages;
use App\Filament\Resources\PensumResource\RelationManagers;
use App\Models\Pensum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class PensumResource extends Resource
{
    protected static ?string $model = Pensum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('IdProgAcademico')
                    ->relationship('programas', 'NomProgAcademico')
                    ->label('Programa')
                    ->required(),
                Forms\Components\TextInput::make('perAcademico_Inicial')
                    ->label('Periodo Académico Inicial')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('perAcademico_Final')
                    ->label('Periodo Académico Final')
                    ->maxLength(45),
                Forms\Components\TextInput::make('desPensum')
                    ->label('Descripción del Pensum')
                    ->required()
                    ->maxLength(40),
                Forms\Components\TextInput::make('numCredAprob')
                    ->label('Número de créditos aprobados')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                Forms\Components\TextInput::make('promMinimo')
                    ->label('Promedio Mínimo')
                    ->required()
                    ->numeric()
                    ->inputMode('decimal')
                    ->minValue(0)
                    ->maxValue(5),
                Forms\Components\TextInput::make('numPeriodos')
                    ->label('Número de periodos')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                Forms\Components\TextInput::make('CodPensum')
                    ->label('Código del Pensum')
                    ->required()
                    ->maxLength(15),
                Forms\Components\Select::make('IdTipPeriodos')
                    ->relationship('periodos', 'DesTipPeriodos')
                    ->label('Periodos')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('programas.NomProgAcademico')
                    ->label('Programa')
                    ->sortable(),
                Tables\Columns\TextColumn::make('perAcademico_Inicial')
                    ->label('Periodo Académico Inicial')
                    ->searchable(),
                Tables\Columns\TextColumn::make('perAcademico_Final')
                    ->label('Periodo Académico Final')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desPensum')
                    ->label('Descripción del Pensum')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numCredAprob')
                    ->label('Número de créditos aprobados')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('promMinimo')
                    ->label('Promedio Mínimo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('numPeriodos')
                    ->label('Número de periodos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periodos.DesTipPeriodos')
                    ->label('Periodos')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListPensums::route('/'),
            'create' => Pages\CreatePensum::route('/create'),
            'edit' => Pages\EditPensum::route('/{record}/edit'),
        ];
    }
}
