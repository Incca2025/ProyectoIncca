<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MunicipioResource\Pages;
use App\Filament\Resources\MunicipioResource\RelationManagers;
use App\Models\Municipio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MunicipioResource extends Resource
{
    protected static ?string $model = Municipio::class;

    protected static ?string $navigationLabel = 'Municipios';

    protected static ?string $modelLabel = 'Municipios';

    protected static ?string $navigationGroup = 'País/Departamento/Municipio';

    protected static ?int $navigationSort = 25;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMunicipio')
                    ->label('Código del Municipio')
                    ->required()
                    ->unique()
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesMunicipio')
                    ->label('Nombre del Municipio')
                    ->required()
                    ->maxLength(45),
                Forms\Components\Select::make('IdTipPais')
                    ->label('País')
                    ->relationship('pais', 'DesPais')
                    ->required(),
                Forms\Components\Select::make('IdTipDepartamento')
                    ->label('Departamento')
                    ->relationship('departamento', 'DesDepartamento')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMunicipio')
                    ->label('Código')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesMunicipio')
                    ->label('Municipio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pais.DesPais')
                    ->label('País')
                    ->sortable(),
                Tables\Columns\TextColumn::make('departamento.DesDepartamento')
                    ->label('Departamento')
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
            'index' => Pages\ListMunicipios::route('/'),
            'create' => Pages\CreateMunicipio::route('/create'),
            'edit' => Pages\EditMunicipio::route('/{record}/edit'),
        ];
    }
}
