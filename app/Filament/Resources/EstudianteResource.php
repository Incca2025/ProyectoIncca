<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstudianteResource\Pages;
use App\Filament\Resources\EstudianteResource\RelationManagers;
use App\Models\Estudiante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstudianteResource extends Resource
{
    protected static ?string $model = Estudiante::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('IdPersona')
                    ->relationship('personas', 'NumDocIdentidad_Num')
                    ->label('Id del Estudiante')
                    ->unique()
                    ->required(),
                Forms\Components\TextInput::make('CodEstudiante')
                    ->label('Código del Estudiante')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('EmailEstudiante')
                    ->label('Correo electrónico del Estudiante')
                    ->required()
                    ->maxLength(80),
                Forms\Components\Select::make('IdEstEstudiante')
                    ->relationship('estud_estados', 'DesEstEstudiante')
                    ->label('Estado del Estudiante')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('IdPersona')
                    ->label('Id del Estudiante')
                    ->sortable(),
                Tables\Columns\TextColumn::make('CodEstudiante')
                    ->label('Código del Estudiante')
                    ->searchable(),
                Tables\Columns\TextColumn::make('EmailEstudiante')
                    ->label('Correo electrónico del Estudiante')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estud_estados.DesEstEstudiante')
                    ->label('Estado del Estudiante')
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
            'index' => Pages\ListEstudiantes::route('/'),
            'create' => Pages\CreateEstudiante::route('/create'),
            'edit' => Pages\EditEstudiante::route('/{record}/edit'),
        ];
    }
}
