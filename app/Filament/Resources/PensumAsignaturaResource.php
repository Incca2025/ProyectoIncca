<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PensumAsignaturaResource\Pages;
use App\Filament\Resources\PensumAsignaturaResource\RelationManagers;
use App\Models\PensumAsignatura;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PensumAsignaturaResource extends Resource
{
    protected static ?string $model = PensumAsignatura::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('numPeriodo')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('Electiva')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('numCreditos')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('IdPensum')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('IdAsignatura')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('numPeriodo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Electiva')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('numCreditos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('IdPensum')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('IdAsignatura')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListPensumAsignaturas::route('/'),
            'create' => Pages\CreatePensumAsignatura::route('/create'),
            'edit' => Pages\EditPensumAsignatura::route('/{record}/edit'),
        ];
    }
}
