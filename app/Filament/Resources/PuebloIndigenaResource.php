<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PuebloIndigenaResource\Pages;
use App\Filament\Resources\PuebloIndigenaResource\RelationManagers;
use App\Models\PuebloIndigena;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class PuebloIndigenaResource extends Resource
{
    protected static ?string $model = PuebloIndigena::class;

    protected static ?string $navigationLabel = 'Pueblos Indígenas';

    protected static ?string $modelLabel = 'Pueblos Indígenas';

    protected static ?string $navigationGroup = 'Datos';

    protected static ?int $navigationSort = 26;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMenPIndigena')
                    ->label('Código')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record)
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesPueIndigena')
                    ->label('Pueblos Indígenas')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMenPIndigena')
                    ->label('Código')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesPueIndigena')
                    ->label('Pueblos Indígenas')
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
            'index' => Pages\ListPuebloIndigenas::route('/'),
            'create' => Pages\CreatePuebloIndigena::route('/create'),
            'edit' => Pages\EditPuebloIndigena::route('/{record}/edit'),
        ];
    }
}
