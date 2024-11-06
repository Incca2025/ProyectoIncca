<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComunidadNegraResource\Pages;
use App\Filament\Resources\ComunidadNegraResource\RelationManagers;
use App\Models\ComunidadNegra;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComunidadNegraResource extends Resource
{
    protected static ?string $model = ComunidadNegra::class;
    
    protected static ?string $navigationLabel = 'Comunidades Negras';

    protected static ?string $modelLabel = 'Comunidades Negras';

    protected static ?string $navigationGroup = 'Datos';

    protected static ?int $navigationSort = 12;

    protected static ?string $navigationIcon = 'heroicon-o-face-smile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMenCN')
                    ->label('Código')
                    ->required()
                    ->unique()
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesComNegra')
                    ->label('Comunidad Negra')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMenCN')
                    ->label('Código')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesComNegra')
                    ->label('Comunidad Negra')
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
            'index' => Pages\ListComunidadNegras::route('/'),
            'create' => Pages\CreateComunidadNegra::route('/create'),
            'edit' => Pages\EditComunidadNegra::route('/{record}/edit'),
        ];
    }
}
