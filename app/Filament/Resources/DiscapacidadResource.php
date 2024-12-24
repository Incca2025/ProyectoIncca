<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscapacidadResource\Pages;
use App\Filament\Resources\DiscapacidadResource\RelationManagers;
use App\Models\Discapacidad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class DiscapacidadResource extends Resource
{
    protected static ?string $model = Discapacidad::class;
    
    protected static ?string $navigationLabel = 'Discapacidades';

    protected static ?string $modelLabel = 'Discapacidades';

    protected static ?string $navigationGroup = 'Datos';

    protected static ?int $navigationSort = 20;

    protected static ?string $navigationIcon = 'heroicon-o-bell-slash';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMenDiscap')
                    ->label('Código')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record)
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesDiscapacidad')
                    ->label('Discapacidad')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMenDiscap')
                    ->label('Código')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesDiscapacidad')
                    ->label('Discapacidad')
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
            'index' => Pages\ListDiscapacidads::route('/'),
            'create' => Pages\CreateDiscapacidad::route('/create'),
            'edit' => Pages\EditDiscapacidad::route('/{record}/edit'),
        ];
    }
}
