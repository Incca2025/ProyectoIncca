<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VariableResource\Pages;
use App\Filament\Resources\VariableResource\RelationManagers;
use App\Models\Variable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VariableResource extends Resource
{
    protected static ?string $model = Variable::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Variable')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('DesVariable')
                    ->required()
                    ->maxLength(200),
                Forms\Components\TextInput::make('NumVariable')
                    ->numeric(),
                Forms\Components\TextInput::make('TxtVariable')
                    ->required()
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Variable')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesVariable')
                    ->searchable(),
                Tables\Columns\TextColumn::make('NumVariable')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('TxtVariable')
                    ->searchable(),
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
            'index' => Pages\ListVariables::route('/'),
            'create' => Pages\CreateVariable::route('/create'),
            'edit' => Pages\EditVariable::route('/{record}/edit'),
        ];
    }
}
