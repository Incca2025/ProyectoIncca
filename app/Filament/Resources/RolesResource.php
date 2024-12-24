<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RolesResource\Pages;
use App\Filament\Resources\RolesResource\RelationManagers;
use App\Models\Roles;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class RolesResource extends Resource
{
    protected static ?string $model = Roles::class;

    protected static ?string $navigationLabel = 'Roles';

    protected static ?string $modelLabel = 'Roles';

    protected static ?string $navigationGroup = 'Personas';

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rol')
                    ->label('Rol')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('descripcion')
                    ->label('Descripción')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rol')
                    ->label('Rol')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción')
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRoles::route('/create'),
            'edit' => Pages\EditRoles::route('/{record}/edit'),
        ];
    }
}
