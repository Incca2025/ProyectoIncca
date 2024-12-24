<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CapacidadExcepcionalResource\Pages;
use App\Filament\Resources\CapacidadExcepcionalResource\RelationManagers;
use App\Models\CapacidadExcepcional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class CapacidadExcepcionalResource extends Resource
{
    protected static ?string $model = CapacidadExcepcional::class;
    protected static ?string $navigationLabel = 'Capacidades Excepcionales';

    protected static ?string $modelLabel = 'Capacidades Excepcionales';

    protected static ?string $navigationGroup = 'Datos';

    protected static ?int $navigationSort = 17;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMenCExpc')
                    ->label('Código')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record)
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesCapExcepcional')
                    ->label('Capacidad Excepcional')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMenCExpc')
                    ->label('Código')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesCapExcepcional')
                    ->label('Capacidad Excepcional')
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
            'index' => Pages\ListCapacidadExcepcionals::route('/'),
            'create' => Pages\CreateCapacidadExcepcional::route('/create'),
            'edit' => Pages\EditCapacidadExcepcional::route('/{record}/edit'),
        ];
    }
}
