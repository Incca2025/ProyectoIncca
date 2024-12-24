<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsignaturaResource\Pages;
use App\Filament\Resources\AsignaturaResource\RelationManagers;
use App\Models\Asignatura;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class AsignaturaResource extends Resource
{
    protected static ?string $model = Asignatura::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodAsignatura')
                    ->label('Código de la Asignatura')
                    ->unique(ignorable: fn ($record) => $record)
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('DesAsignatura')
                    ->label('Descripción de la Asignatura')
                    ->required()
                    ->maxLength(200),
                Forms\Components\Select::make('IdDepartamento')
                    ->relationship('departamento', 'DesDepartamento')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodAsignatura')
                    ->label('Código de la Asignatura')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesAsignatura')
                    ->label('Descripción de la Asignatura')
                    ->sortable()
		            ->searchable(),
                Tables\Columns\TextColumn::make('departamento.DesDepartamento')
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
            'index' => Pages\ListAsignaturas::route('/'),
            'create' => Pages\CreateAsignatura::route('/create'),
            'edit' => Pages\EditAsignatura::route('/{record}/edit'),
        ];
    }

    // public static function shouldRegisterNavigation(): bool
    // {
    //     return false;
    // }

}
