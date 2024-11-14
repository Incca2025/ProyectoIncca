<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NivelProgramaResource\Pages;
use App\Filament\Resources\NivelProgramaResource\RelationManagers;
use App\Models\NivelPrograma;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NivelProgramaResource extends Resource
{
    protected static ?string $model = NivelPrograma::class;

    protected static ?string $navigationLabel = 'Nivel Programas Académicos';

    protected static ?string $modelLabel = 'Nivel Programas Académicos';

    protected static ?string $navigationGroup = 'Académicos';

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationIcon = 'heroicon-o-folder-arrow-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('DesPrograma')
                    ->label('Nivel del Programa')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('DesPrograma')
                    ->label('Nivel del Programa')
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
            'index' => Pages\ListNivelProgramas::route('/'),
            'create' => Pages\CreateNivelPrograma::route('/create'),
            'edit' => Pages\EditNivelPrograma::route('/{record}/edit'),
        ];
    }
}
