<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConDiscapacidadResource\Pages;
use App\Filament\Resources\ConDiscapacidadResource\RelationManagers;
use App\Models\ConDiscapacidad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConDiscapacidadResource extends Resource
{
    protected static ?string $model = ConDiscapacidad::class;

    protected static ?string $navigationLabel = 'Con Discapacidades';

    protected static ?string $modelLabel = 'Con Discapacidades';

    protected static ?string $navigationGroup = 'Datos';

    protected static ?int $navigationSort = 13;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMenCDiscap')
                    ->label('Código')
                    ->required()
                    ->unique()
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesConDiscapacidad')
                    ->label('Con Discapacidad')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMenCDiscap')
                    ->label('Código')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesConDiscapacidad')
                    ->label('Con Discapacidad')
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
            'index' => Pages\ListConDiscapacidads::route('/'),
            'create' => Pages\CreateConDiscapacidad::route('/create'),
            'edit' => Pages\EditConDiscapacidad::route('/{record}/edit'),
        ];
    }
}
