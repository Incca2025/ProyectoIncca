<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstadoSeguimientoResource\Pages;
use App\Filament\Resources\EstadoSeguimientoResource\RelationManagers;
use App\Models\EstadoSeguimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class EstadoSeguimientoResource extends Resource
{
    protected static ?string $model = EstadoSeguimiento::class;

    protected static ?string $navigationLabel = 'Estado Seguimientos';

    protected static ?string $modelLabel = 'Estado Seguimientos';

    protected static ?string $navigationGroup = 'Seguimientos';

    protected static ?int $navigationSort = 16;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('IdIntEstSeguimiento')
                    ->label('Id del Estado de Seguimiento')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('DesIntEstSeguimiento')
                    ->label('Descripción del Estado de Seguimiento')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('ActivaMatricula')
                    ->label('Matrícula Activa')
                    ->numeric()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('DesIntEstSeguimiento')
                    ->label('Descripción del Estado de Seguimiento')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ActivaMatricula')
                    ->sortable()
                    ->label('Matrícula Activa')
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
            'index' => Pages\ListEstadoSeguimientos::route('/'),
            'create' => Pages\CreateEstadoSeguimiento::route('/create'),
            'edit' => Pages\EditEstadoSeguimiento::route('/{record}/edit'),
        ];
    }
}
