<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZonaResidenciaResource\Pages;
use App\Filament\Resources\ZonaResidenciaResource\RelationManagers;
use App\Models\ZonaResidencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ZonaResidenciaResource extends Resource
{
    protected static ?string $model = ZonaResidencia::class;

    protected static ?string $navigationLabel = 'Zona Residencias';

    protected static ?string $modelLabel = 'Zona Residencias';

    protected static ?string $navigationGroup = 'Datos';

    protected static ?int $navigationSort = 22;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMenZResidencial')
                    ->label('Código')
                    ->required()
                    ->unique()
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesZonaResidencial')
                    ->label('Zona Residencial')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMenZResidencial')
                    ->label('Código')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesZonaResidencial')
                    ->label('Zona Residencial')
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
            'index' => Pages\ListZonaResidencias::route('/'),
            'create' => Pages\CreateZonaResidencia::route('/create'),
            'edit' => Pages\EditZonaResidencia::route('/{record}/edit'),
        ];
    }
}
