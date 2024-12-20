<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeguimientoResource\Pages;
use App\Filament\Resources\SeguimientoResource\RelationManagers;
use App\Models\Seguimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class SeguimientoResource extends Resource
{
    protected static ?string $model = Seguimiento::class;

    protected static ?string $navigationLabel = 'Seguimientos';

    protected static ?string $modelLabel = 'Seguimientos';

    protected static ?string $navigationGroup = 'Seguimientos';

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('IdIntTipSeguimiento')
                    ->relationship('tipoSeguimiento', 'DesTipSeguimiento')    
                    ->label('Tipo de Contacto')
                    ->required(),
                Forms\Components\TextInput::make('ObsIntSeguimiento')
                    ->label('Observación')
                    // ->columnSpanFull()
                    ->required()
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('interesado.Nombres_Int')
                    ->label('Interesado')
                    ->sortable()
                    ->formatStateUsing(fn ($record) => $record->interesado->Nombres_Int . ' ' . $record->interesado->Apellidos_Int)
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipoSeguimiento.DesTipSeguimiento')
                    ->label('Tipo de Contacto')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ObsIntSeguimiento')
                    ->label('Observación')
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
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListSeguimientos::route('/'),
            'create' => Pages\CreateSeguimiento::route('/create'),
            'view' => Pages\ViewSeguimiento::route('/{record}'),
            'edit' => Pages\EditSeguimiento::route('/{record}/edit'),
        ];
    }
}
