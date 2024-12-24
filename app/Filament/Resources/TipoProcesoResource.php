<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoProcesoResource\Pages;
use App\Filament\Resources\TipoProcesoResource\RelationManagers;
use App\Models\TipoProceso;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class TipoProcesoResource extends Resource
{
    protected static ?string $model = TipoProceso::class;

    protected static ?string $navigationGroup = 'Académicos';

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('DesTipProceso')
                    ->label('Descripción del Tipo de Proceso')
                    ->required()
                    ->maxLength(30),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('DesTipProceso')
                    ->label('Descripción del Tipo de Proceso')
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
            'index' => Pages\ListTipoProcesos::route('/'),
            'create' => Pages\CreateTipoProceso::route('/create'),
            'edit' => Pages\EditTipoProceso::route('/{record}/edit'),
        ];
    }
}
