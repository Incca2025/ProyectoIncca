<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PensumAsignaturaResource\Pages;
use App\Filament\Resources\PensumAsignaturaResource\RelationManagers;
use App\Models\PensumAsignatura;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class PensumAsignaturaResource extends Resource
{
    protected static ?string $model = PensumAsignatura::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('IdPensum')
                    ->relationship('pensum', 'desPensum')
                    ->label(label: 'Pensum')
                    ->required(),
                Forms\Components\TextInput::make('numPeriodo')
                    ->label('Número de periodo')
                    ->required()
                    ->numeric()
                    ->default(1)
                    ->minValue(1),
                Forms\Components\Select::make('IdAsignatura')
                    ->relationship('asignaturas', 'DesAsignatura')
                    ->label(label: 'Asignatura')
                    ->required(),
                Forms\Components\TextInput::make('Electiva')
                    ->label('Electiva')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->minValue(0),
                Forms\Components\TextInput::make('numCreditos')
                    ->label(label: 'Número de créditos')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->minValue(0),
                Forms\Components\TextInput::make('NumCreditosPreRequisito')
                    ->label('Número de créditos pre-requisito')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->minValue(0),
                Forms\Components\TextInput::make('NumHorClase')
                    ->label('Número de horas de clase')
                    ->required()
                    ->numeric()
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pensum.desPensum')
                    ->label(label: 'Pensum')
                    ->sortable(),
                Tables\Columns\TextColumn::make('numPeriodo')
                    ->label('Número de periodo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('asignaturas.DesAsignatura')
                    ->label(label: 'Asignatura')
                    ->sortable(),
                Tables\Columns\TextColumn::make('Electiva')
                    ->label('Electiva')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('numCreditos')
                    ->label(label: 'Número de créditos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('NumCreditosPreRequisito')
                    ->label(label: 'Número de créditos pre-requisito')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('NumHorClase')
                    ->label(label: 'Número de horas de clase')
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
            'index' => Pages\ListPensumAsignaturas::route('/'),
            'create' => Pages\CreatePensumAsignatura::route('/create'),
            'edit' => Pages\EditPensumAsignatura::route('/{record}/edit'),
        ];
    }
}
