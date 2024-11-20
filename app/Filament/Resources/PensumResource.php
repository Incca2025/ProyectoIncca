<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PensumResource\Pages;
use App\Filament\Resources\PensumResource\RelationManagers;
use App\Models\Pensum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PensumResource extends Resource
{
    protected static ?string $model = Pensum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('IdProgAcademico')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('perAcademico_Inicial')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('perAcademico_Final')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('desPensum')
                    ->required()
                    ->maxLength(40),
                Forms\Components\TextInput::make('numCredAprob')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('promMínimo')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('numPeriodos')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('IdTipPeriodos')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('IdProgAcademico')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('perAcademico_Inicial')
                    ->searchable(),
                Tables\Columns\TextColumn::make('perAcademico_Final')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desPensum')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numCredAprob')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('promMínimo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('numPeriodos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('IdTipPeriodos')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListPensums::route('/'),
            'create' => Pages\CreatePensum::route('/create'),
            'edit' => Pages\EditPensum::route('/{record}/edit'),
        ];
    }
}
