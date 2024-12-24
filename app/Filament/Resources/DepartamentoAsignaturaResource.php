<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartamentoAsignaturaResource\Pages;
use App\Filament\Resources\DepartamentoAsignaturaResource\RelationManagers;
use App\Models\DepartamentoAsignatura;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class DepartamentoAsignaturaResource extends Resource
{
    protected static ?string $model = DepartamentoAsignatura::class;

    protected static ?string $navigationGroup = 'Programas Académicos';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CodDepartamento')
                    ->label('Código')
                    ->unique(ignorable: fn ($record) => $record)
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('DesDepartamento')
                    ->label('Descripción del Departamento')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CodDepartamento')
                    ->label('Código')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('DesDepartamento')
                    ->label('Descripción del Departamento')
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
                Action::make('verAsignaturas')
                    ->label('Asignaturas')
                    ->url(fn () => AsignaturaResource::getUrl('index'))
                    ->icon('heroicon-o-arrow-right'),
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
            'index' => Pages\ListDepartamentoAsignaturas::route('/'),
            'create' => Pages\CreateDepartamentoAsignatura::route('/create'),
            'edit' => Pages\EditDepartamentoAsignatura::route('/{record}/edit'),
        ];
    }
}
