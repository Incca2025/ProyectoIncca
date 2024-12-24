<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\ProgramaAcademico;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProgramaAcademicoResource\Pages;
use App\Filament\Resources\ProgramaAcademicoResource\RelationManagers;

class ProgramaAcademicoResource extends Resource
{
    protected static ?string $model = ProgramaAcademico::class;

    protected static ?string $navigationLabel = 'Programas Académicos';

    protected static ?string $modelLabel = 'Programas Académicos';

    protected static ?string $navigationGroup = 'Programas Académicos';

    protected static ?int $navigationSort = 3;

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
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('CodProgAcademico')
                    ->label('Código del Programa Académico')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nivel.DesPrograma')
                    ->label('Nivel del Programa Académico')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('NumPeriodos')
                    ->label('Número de Periodos Académicos')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('periodo.DesTipPeriodos')
                    ->label('Periodo Académico')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Snies')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ResMen')
                    ->label('Resolución')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('FecResMen')
                    ->label('Fecha de la Resolución')
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
                Action::make('verProgramaAcademicoPeriodos')
                    ->label('Periodos')
                    ->url(fn () => ProgacaPeriodoResource::getUrl('index'))
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
            'index' => Pages\ListProgramaAcademicos::route('/'),
            'create' => Pages\CreateProgramaAcademico::route('/create'),
            'edit' => Pages\EditProgramaAcademico::route('/{record}/edit'),
        ];
    }
}
