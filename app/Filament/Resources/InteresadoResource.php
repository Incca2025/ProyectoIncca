<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use App\Models\Interesado;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InteresadoResource\Pages;
use App\Filament\Resources\InteresadoResource\RelationManagers;
use App\Filament\Resources\InteresadoResource\RelationManagers\SeguimientosRelationManager;
use Filament\Tables\Enums\ActionsPosition;

class InteresadoResource extends Resource
{
    protected static ?string $model = Interesado::class;
    
    protected static ?string $navigationLabel = 'Interesados';

    protected static ?string $navigationGroup = 'Personas';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Nombres_Int')
                    ->label('Nombres')
                    ->required()
                    ->maxLength(60),
                Forms\Components\TextInput::make('Apellidos_Int')
                    ->label('Apellidos')
                    ->required()
                    ->maxLength(60),
                Forms\Components\TextInput::make('Email_Int')
                    ->label('Correo Electrónico')
                    ->email()
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('IdProgAcademico')
                    ->label('Programa de interés')
                    ->relationship('programa', 'NomProgAcademico', 
                        function ( Builder $query ) {
                            $query->orderBy( 'IdNivPrograma', 'ASC' );
                        })
                    ->required(),
                Forms\Components\TextInput::make('Celular_Int')
                    ->label('Número de Celular')
                    ->required()
                    ->maxLength(15),
                Forms\Components\Select::make('IdIntEstSeguimiento')
                    ->relationship('estados', 'DesIntEstSeguimiento')
                    ->label('Estado de Seguimiento')
                    ->live() 
                    // ->disabled(fn (Get $get) => $get('IdIntEstSeguimiento') == 5)
                    ->required(),
                // Forms\Components\Actions::make([
                //     Forms\Components\Actions\Action::make('crearPrematricula')
                //         ->label('Crear Prematricula')
                //         ->visible(fn (Get $get) => $get('IdIntEstSeguimiento') == 5)
                //     ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Nombres_Int')
                    ->label('Nombres')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Apellidos_Int')
                    ->label('Apellidos')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Email_Int')
                    ->label('Correo Electrónico')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('programa.NomProgAcademico')
                    ->label('Programa de interés')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Celular_Int')
                    ->label('Número de Celular')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('estados.DesIntEstSeguimiento')
                    ->label('Estado de Seguimiento')
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
                Tables\Actions\EditAction::make('Ver Seguimientos')
                    ->label('Seguimientos')
                    ->color('primary')
                    ->icon('heroicon-o-eye'),
                Action::make('probarGoogleClient')
                    ->label('Probar Cliente Google')
                    ->action(function () {
                        try {
                            $googleClient = app('google'); // Carga el cliente de Google.
                            $clientInfo = $googleClient->getClient(); // Prueba básica para obtener información.
                            dd($clientInfo); // Muestra la información para depuración.
                        } catch (\Exception $e) {
                            dd('Error:', $e->getMessage());
                        }
                    })
                    ->color('success')
                    ->icon('heroicon-o-check'),
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
            SeguimientosRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInteresados::route('/'),
            // 'create' => Pages\CreateInteresado::route('/create'),
            'edit' => Pages\EditInteresado::route('/{record}/edit'),
        ];
    }
}
