<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pensum;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use App\Models\PensumAsignatura;
use Filament\Resources\Resource;
use App\Models\ProgramaAcademico;
use Illuminate\Support\Collection;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PensumAsignaturaResource\Pages;
use App\Filament\Resources\PensumAsignaturaResource\RelationManagers;

class PensumAsignaturaResource extends Resource
{
    protected static ?string $model = PensumAsignatura::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Programas Académicos y Pensum')
                    ->schema([
                        Forms\Components\Select::make('IdProgAcademico')
                            ->label('Programa Académico')
                            ->options(fn () => ProgramaAcademico::pluck('NomProgAcademico', 'IdProgAcademico'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->dehydrated(false)
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                $set('IdPensum', null); 
                                $set('IdAsignatura', null); 
                                $set('hasPensum', Pensum::where('IdProgAcademico', $get('IdProgAcademico'))->exists());
                            })
                            ->afterStateHydrated(function (Set $set, Get $get) {
                                if ($get('IdPensum')) {
                                    $pensum = Pensum::find($get('IdPensum'));
                                    $set('IdProgAcademico', $pensum?->IdProgAcademico);
                                }
                            })
                            ->required(),
                        Forms\Components\Select::make('IdPensum')
                            ->label(label: 'Pensum')
                            ->options(fn (Get $get): Collection => Pensum::query()
                                ->where('IdProgAcademico', $get('IdProgAcademico'))
                                ->pluck('desPensum', 'IdPensum'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required(),
                    ]),
                Forms\Components\Fieldset::make('Datos de la Asignatura')
                    ->schema([
                        Forms\Components\Select::make('IdAsignatura')
                            ->relationship('asignaturas', 'DesAsignatura')
                            ->label(label: 'Asignatura')
                            ->searchable()
                            ->preload()
                            ->disabled(fn (Get $get) => !$get('hasPensum'))
                            ->required(),
                        Forms\Components\TextInput::make('numPeriodo')
                            ->label('Número de periodo')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->disabled(fn (Get $get) => !$get('hasPensum'))
                            ->required(),
                        Forms\Components\Select::make('Electiva')
                            ->label('Electiva')
                            ->options([
                                0 => 'No',
                                1 => 'Si',
                            ])
                            ->default(0)
                            ->disabled(fn (Get $get) => !$get('hasPensum'))
                            ->required(),
                        Forms\Components\TextInput::make('numCreditos')
                            ->label(label: 'Número de créditos')
                            ->numeric()
                            ->default(0)
                            ->disabled(fn (Get $get) => !$get('hasPensum'))
                            ->minValue(0)
                            ->required(),
                        Forms\Components\TextInput::make('NumCreditosPreRequisito')
                            ->label('Número de créditos pre-requisito')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->disabled(fn (Get $get) => !$get('hasPensum'))
                            ->required(),
                        Forms\Components\TextInput::make('NumHorClase')
                            ->label('Número de horas de clase por semana')
                            ->numeric()
                            ->minValue(0)
                            ->disabled(fn (Get $get) => !$get('hasPensum'))
                            ->required(),
                    ]),
            ]);     
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pensum.programas.NomProgAcademico')
                    ->label(label: 'Programa Académico')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pensum.desPensum')
                    ->label(label: 'Pensum')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('numPeriodo')
                    ->label('Número de periodo')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('asignaturas.DesAsignatura')
                    ->label(label: 'Asignatura')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Electiva')
                    ->label('Electiva')
                    ->formatStateUsing(fn ($state) => $state === 0 ? 'No' : 'Si')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('numCreditos')
                    ->label(label: 'Créditos')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('NumCreditosPreRequisito')
                    ->label(label: 'Cred. pre-requisito')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('NumHorClase')
                    ->label(label: 'Int Semanal')
                    ->numeric()
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
                SelectFilter::make('IdProgAcademico')
                    ->relationship('pensum.programas', 'NomProgAcademico')
                    ->label('Programa Académico')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('IdPensum')
                    ->relationship('pensum', 'desPensum')
                    ->label('Pensum')
                    ->searchable()
                    ->preload(),
                Filter::make('numPeriodo')
                    ->label('Número de Periodo')
                    ->form([
                        Forms\Components\TextInput::make('numPeriodo')
                            ->numeric()
                            ->label('Número de Periodo'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            isset($data['numPeriodo']), 
                            fn ($q) => $q->where('numPeriodo', $data['numPeriodo'])
                        );
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('verPensumRequisitos')
                    ->label('Requisitos')
                    ->url(fn () => PensumAsignaturaRequisitosResource::getUrl('index'))
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
            'index' => Pages\ListPensumAsignaturas::route('/'),
            'create' => Pages\CreatePensumAsignatura::route('/create'),
            'edit' => Pages\EditPensumAsignatura::route('/{record}/edit'),
        ];
    }
    
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

}
