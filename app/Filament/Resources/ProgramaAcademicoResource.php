<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramaAcademicoResource\Pages;
use App\Filament\Resources\ProgramaAcademicoResource\RelationManagers;
use App\Models\ProgramaAcademico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramaAcademicoResource extends Resource
{
    protected static ?string $model = ProgramaAcademico::class;

    protected static ?string $navigationLabel = 'Programas Académicos';

    protected static ?string $modelLabel = 'Programas Académicos';

    protected static ?string $navigationGroup = 'Académicos';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NomProgAcademico')
                    ->label('Nombre del Programa Académico')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('CodProgAcademico')
                    ->label('Código del Programa Académico')
                    ->unique(ignorable: fn ($record) => $record)
                    ->required()
                    ->maxLength(15),
                Forms\Components\Select::make('IdNivPrograma')
                    ->label('Nivel del Programa Académico')
                    ->relationship('nivel', 'DesPrograma', 
                        function ( Builder $query ) {
                            $query->orderBy( 'IdNivPrograma', 'ASC' );
                        })
                    ->required(),
                Forms\Components\TextInput::make('NumPeriodos')
                    ->label('Número de Periodos Académicos')
                    ->numeric()
                    ->minValue(1)
                    ->required(),
                Forms\Components\Select::make('IdTipPeriodos')
                    ->label('Periodo Académico')
                    ->relationship('periodo', 'DesTipPeriodos', 
                        function ( Builder $query ) {
                            $query->orderBy( 'IdTipPeriodos', 'ASC' );
                        })
                    ->required(),
                Forms\Components\TextInput::make('Snies')
                    ->required(),
                Forms\Components\TextInput::make('ResMen')
                    ->label('Resolución')
                    ->required(),
                Forms\Components\DatePicker::make('FecResMen')
                    ->label('Fecha de la Resolución')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('NomProgAcademico')
                    ->label('Nombre del Programa Académico')
                    ->searchable(),
                Tables\Columns\TextColumn::make('CodProgAcademico')
                    ->label('Código del Programa Académico')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nivel.DesPrograma')
                    ->label('Nivel del Programa Académico')
                    ->sortable(),
                Tables\Columns\TextColumn::make('NumPeriodos')
                    ->label('Número de Periodos Académicos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periodo.DesTipPeriodos')
                    ->label('Periodo Académico')
                    ->sortable(),
                Tables\Columns\TextColumn::make('Snies')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ResMen')
                    ->label('Resolución')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('FecResMen')
                    ->label('Fecha de la Resolución')
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
            'index' => Pages\ListProgramaAcademicos::route('/'),
            'create' => Pages\CreateProgramaAcademico::route('/create'),
            'edit' => Pages\EditProgramaAcademico::route('/{record}/edit'),
        ];
    }
}
