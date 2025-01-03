<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GrupoEtnicoResource\Pages;
use App\Filament\Resources\GrupoEtnicoResource\RelationManagers;
use App\Models\GrupoEtnico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class GrupoEtnicoResource extends Resource
{
    protected static ?string $model = GrupoEtnico::class;

    protected static ?string $navigationLabel = 'Grupos Étnicos';

    protected static ?string $modelLabel = 'Grupos Étnicos';

    protected static ?string $navigationGroup = 'Datos';

    protected static ?int $navigationSort = 24;

    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMenGEtnico')
                    ->label('Código')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record)
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesGrupEtnico')
                    ->label('Grupo Étnico')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMenGEtnico')
                    ->label('Código')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesGrupEtnico')
                    ->label('Grupo Étnico')
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
            'index' => Pages\ListGrupoEtnicos::route('/'),
            'create' => Pages\CreateGrupoEtnico::route('/create'),
            'edit' => Pages\EditGrupoEtnico::route('/{record}/edit'),
        ];
    }
}
