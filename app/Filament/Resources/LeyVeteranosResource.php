<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeyVeteranosResource\Pages;
use App\Filament\Resources\LeyVeteranosResource\RelationManagers;
use App\Models\LeyVeteranos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class LeyVeteranosResource extends Resource
{
    protected static ?string $model = LeyVeteranos::class;

    protected static ?string $navigationLabel = 'Ley Veteranos';

    protected static ?string $modelLabel = 'Ley Veteranos';

    protected static ?string $navigationGroup = 'Datos';

    protected static ?int $navigationSort = 25;

    protected static ?string $navigationIcon = 'heroicon-o-scale';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMenVetarno')
                    ->label('Código')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record)
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesVeterano')
                    ->label('Ley Veteranos')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMenVetarno')
                    ->label('Código')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesVeterano')
                    ->label('Ley Veteranos')
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
            'index' => Pages\ListLeyVeteranos::route('/'),
            'create' => Pages\CreateLeyVeteranos::route('/create'),
            'edit' => Pages\EditLeyVeteranos::route('/{record}/edit'),
        ];
    }
}
