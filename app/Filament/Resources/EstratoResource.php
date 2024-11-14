<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstratoResource\Pages;
use App\Filament\Resources\EstratoResource\RelationManagers;
use App\Models\Estrato;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstratoResource extends Resource
{
    protected static ?string $model = Estrato::class;
    
    protected static ?string $navigationLabel = 'Estratos';

    protected static ?string $modelLabel = 'Estratos';
    
    protected static ?string $navigationGroup = 'Datos';

    protected static ?int $navigationSort = 17;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodMenEstrato')
                    ->label('Código')
                    ->required()
                    ->unique(ignorable: fn ($record) => $record)
                    ->maxLength(5),
                Forms\Components\TextInput::make('DesEstrato')
                    ->label('Estrado')
                    ->required()
                    ->maxLength(45),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodMenEstrato')
                    ->label('Código')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesEstrato')
                    ->label('Estrado')
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
            'index' => Pages\ListEstratos::route('/'),
            'create' => Pages\CreateEstrato::route('/create'),
            'edit' => Pages\EditEstrato::route('/{record}/edit'),
        ];
    }
}
