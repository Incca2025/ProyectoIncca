<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InteresadoResource\Pages;
use App\Filament\Resources\InteresadoResource\RelationManagers;
use App\Models\Interesado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InteresadoResource extends Resource
{
    protected static ?string $model = Interesado::class;
    
    protected static ?string $navigationLabel = 'Interesados';

    protected static ?string $navigationGroup = 'Personas';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Nombres_Int')
                    ->required()
                    ->maxLength(60),
                Forms\Components\TextInput::make('Apellidos_Int')
                    ->required()
                    ->maxLength(60),
                Forms\Components\TextInput::make('Email_Int')
                    ->email()
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('IdProgAcademico')
                    ->relationship('programa', 'NomProgAcademico', 
                        function ( Builder $query ) {
                            $query->orderBy( 'IdNivPrograma', 'ASC' );
                        })
                    ->required(),
                Forms\Components\TextInput::make('Celular_Int')
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('Estado')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Nombres_Int')
                    ->label('Nombres del Interesado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Apellidos_Int')
                    ->label('Apellidos del Interesado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Email_Int')
                    ->label('Correo Electrónico del Interesado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('programa.NomProgAcademico')
                    ->label('Programa de interés')
                    ->sortable(),
                Tables\Columns\TextColumn::make('Celular_Int')
                    ->label('Celular del Interesado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Estado')
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
            'index' => Pages\ListInteresados::route('/'),
            'create' => Pages\CreateInteresado::route('/create'),
            'edit' => Pages\EditInteresado::route('/{record}/edit'),
        ];
    }
}
