<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneroBiologicoResource\Pages;
use App\Filament\Resources\GeneroBiologicoResource\RelationManagers;
use App\Models\GeneroBiologico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GeneroBiologicoResource extends Resource
{
    protected static ?string $model = GeneroBiologico::class;

    protected static ?string $navigationLabel = 'Géneros Biológicos';

    protected static ?string $modelLabel = 'Géneros Biológicos';

    protected static ?string $navigationGroup = 'Datos';

    protected static ?int $navigationSort = 18;

    protected static ?string $navigationIcon = 'heroicon-o-hand-thumb-up';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMenGBio')
                    ->label('Código')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record)
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesGenBiologico')
                    ->label('Género Biológico')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMenGBio')
                    ->label('Código')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesGenBiologico')
                    ->label('Género Biológico')
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
            'index' => Pages\ListGeneroBiologicos::route('/'),
            'create' => Pages\CreateGeneroBiologico::route('/create'),
            'edit' => Pages\EditGeneroBiologico::route('/{record}/edit'),
        ];
    }
}
