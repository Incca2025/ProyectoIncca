<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoSeguimientoResource\Pages;
use App\Filament\Resources\TipoSeguimientoResource\RelationManagers;
use App\Models\TipoSeguimiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoSeguimientoResource extends Resource
{
    protected static ?string $model = TipoSeguimiento::class;

    protected static ?string $navigationLabel = 'Tipo Seguimientos';

    protected static ?string $modelLabel = 'Tipo Seguimientos';

    protected static ?string $navigationGroup = 'Seguimientos';

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('DesTipSeguimiento')
                    ->label('Descripción del Tipo de Seguimiento')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('InstTipSeguimiento')
                    ->label('Instructivo')
                    ->required()
                    ->maxLength(4000),
                Forms\Components\Checkbox::make('ActivaMatricula')
                    ->label('Matrícula')
                    ->inline(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('DesTipSeguimiento')
                    ->label('Descripción del Tipo de Seguimiento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ActivaMatricula')
                    ->label('Matrícula')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('InstTipSeguimiento')
                    ->label('Instructivo')
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
            'index' => Pages\ListTipoSeguimientos::route('/'),
            'create' => Pages\CreateTipoSeguimiento::route('/create'),
            'edit' => Pages\EditTipoSeguimiento::route('/{record}/edit'),
        ];
    }
}
