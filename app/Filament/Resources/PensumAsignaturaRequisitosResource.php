<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PensumAsignaturaRequisitosResource\Pages;
use App\Filament\Resources\PensumAsignaturaRequisitosResource\RelationManagers;
use App\Models\PensumAsignaturaRequisitos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PensumAsignaturaRequisitosResource extends Resource
{
    protected static ?string $model = PensumAsignaturaRequisitos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('IdPen_Asignatura') 
                    ->relationship('pensumasignatura', 'IdPensum')
                    ->label(label: 'Pensum')
                    ->required(),
                Forms\Components\Select::make('IdAsignatura')
                    ->relationship('asignaturas', 'DesAsignatura')
                    ->label(label: 'Asignatura')
                    ->required(),
                Forms\Components\TextInput::make('Prerequisito')
                    ->label(label: 'Pre-requisito')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pensumasignatura.IdPensum')
                    ->label(label: 'Pensum')
                    ->sortable(),
                Tables\Columns\TextColumn::make('asignaturas.DesAsignatura')
                    ->label(label: 'Asignatura')
                    ->sortable(),
                Tables\Columns\TextColumn::make('Prerequisito')
                    ->label(label: 'Pre-requisito')
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
            ])
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
            'index' => Pages\ListPensumAsignaturaRequisitos::route('/'),
            'create' => Pages\CreatePensumAsignaturaRequisitos::route('/create'),
            'edit' => Pages\EditPensumAsignaturaRequisitos::route('/{record}/edit'),
        ];
    }
}
