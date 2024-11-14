<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartamentoResource\Pages;
use App\Filament\Resources\DepartamentoResource\RelationManagers;
use App\Models\Departamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartamentoResource extends Resource
{
    protected static ?string $model = Departamento::class;

    protected static ?string $navigationLabel = 'Departamentos';

    protected static ?string $modelLabel = 'Departamentos';

    protected static ?string $navigationGroup = 'País/Departamento/Municipio';

    protected static ?int $navigationSort = 25;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodDepartamento')
                    ->label('Código del Departamento')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record)
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesDepartamento')
                    ->label('Nombre del Departamento')
                    ->required()
                    ->maxLength(45),
                Forms\Components\Select::make('IdTipPais')
                    ->label('País')
                    ->relationship('pais', 'DesPais', fn ($query) => $query->where('IdTipPais', 1))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodDepartamento')
                    ->label('Código')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesDepartamento')
                    ->label('Departamento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pais.DesPais')
                    ->label('País')
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
            'index' => Pages\ListDepartamentos::route('/'),
            'create' => Pages\CreateDepartamento::route('/create'),
            'edit' => Pages\EditDepartamento::route('/{record}/edit'),
        ];
    }
}
