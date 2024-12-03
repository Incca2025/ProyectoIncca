<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstudEstadoResource\Pages;
use App\Filament\Resources\EstudEstadoResource\RelationManagers;
use App\Models\EstudEstado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstudEstadoResource extends Resource
{
    protected static ?string $model = EstudEstado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('IdEstEstudiante')
                    ->label('Id Estado Estudiante')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                Forms\Components\TextInput::make('DesEstEstudiante')
                    ->label('Descripción del Estudiante')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('ActEstEstudiante')
                    ->label('Estudiante Activo')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('IdEstEstudiante')
                    ->label('Id Estado Estudiante')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('DesEstEstudiante')
                    ->label('Descripción del Estudiante')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ActEstEstudiante')
                    ->label('Estudiante Activo')
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
            'index' => Pages\ListEstudEstados::route('/'),
            'create' => Pages\CreateEstudEstado::route('/create'),
            'edit' => Pages\EditEstudEstado::route('/{record}/edit'),
        ];
    }
}
