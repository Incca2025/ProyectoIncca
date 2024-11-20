<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodoPensumResource\Pages;
use App\Filament\Resources\PeriodoPensumResource\RelationManagers;
use App\Models\PeriodoPensum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeriodoPensumResource extends Resource
{
    protected static ?string $model = PeriodoPensum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('DesTipPeriodos')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('NumMes')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('DesTipPeriodos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('NumMes')
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
            'index' => Pages\ListPeriodoPensums::route('/'),
            'create' => Pages\CreatePeriodoPensum::route('/create'),
            'edit' => Pages\EditPeriodoPensum::route('/{record}/edit'),
        ];
    }
}
