<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProgacaPeriodo;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rule;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProgacaPeriodoResource\Pages;
use App\Filament\Resources\ProgacaPeriodoResource\RelationManagers;

class ProgacaPeriodoResource extends Resource
{
    protected static ?string $model = ProgacaPeriodo::class;

    protected static ?string $navigationLabel = 'Programa Académico Periodos';

    protected static ?string $modelLabel = 'Programa Académico Periodos';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Forms\Components\Select::make('IdProgAcademico')
                        ->relationship('programaAcademico', 'NomProgAcademico')
                        ->label('Programa Académico')
                        ->searchable()
                        ->preload()
                        ->disabled(fn (string $operation): bool => $operation === 'edit')
                        ->required(),
                    Forms\Components\TextInput::make('Peracademico')
                        ->label('Periodo Académico')
                        ->required()
                        ->minValue(1)
                        ->disabled(fn (string $operation): bool => $operation === 'edit')
                        ->unique(
                            modifyRuleUsing: function (Unique $rule, $livewire) {
                                return $rule->where('IdProgAcademico', $livewire->data['IdProgAcademico'] ?? null);
                            }
                        )
                        ->validationMessages([
                            'unique' => 'La combinación de Programa Académico y Período Académico ya existe.',
                        ])
                        // ->rule(function () {
                        //     return Rule::unique('progaca_periodo') // Tabla de tu base de datos
                        //         ->where('IdProgAcademico', request()->input('IdProgAcademico'))
                        //         ->ignore(request()->route('record')); // Ignora el registro actual
                        // })
                        // ->helperText('La combinación del programa académico y periodo debe ser única.')
                        ->numeric(),
                    Forms\Components\TextInput::make('ValMatNuevos')
                        ->label('Valor de matrículas estudiantes nuevos')
                        ->inputMode('decimal')
                        ->minValue(1)
                        ->required()
                        ->numeric(),
                    ]),
                        
                Section::make()->schema([
                    Forms\Components\DatePicker::make('FecIniInscripciones')
                        ->label('Fecha inicial de inscripciones')
                        ->required(),
                    Forms\Components\DatePicker::make('FecFinInscripciones')
                        ->label('Fecha final de inscripciones')
                        ->required(),
                    Forms\Components\DatePicker::make('FecIniMatriculas')
                        ->label('Fecha inicial de matrículas')
                        ->required(),
                    Forms\Components\DatePicker::make('FecFinMatriculas')
                        ->label('Fecha final de matrículas')
                        ->required(),
                    Forms\Components\DatePicker::make('FecIniClases')
                        ->label('Fecha inicial de clases')
                        ->required(),
                    Forms\Components\DatePicker::make('FecFinClases')
                        ->label('Fecha final de clases')
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('programaAcademico.NomProgAcademico')
                    ->label('Programa Académico')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Peracademico')
                    ->label('Periodo Académico')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ValMatNuevos')
                    ->label('Valor de matrículas estudiantes nuevos')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('FecIniInscripciones')
                    ->label('Fecha inicial de inscripciones')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('FecFinInscripciones')
                    ->label('Fecha final de inscripciones')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('FecIniMatriculas')
                    ->label('Fecha inicial de matrículas')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('FecFinMatriculas')
                    ->label('Fecha final de matrículas')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('FecIniClases')
                    ->label('Fecha inicial de clases')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('FecFinClases')
                    ->label('Fecha final de clases')
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
                    ->relationship('programaAcademico', 'NomProgAcademico')
                    ->label('Programa Académico')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProgacaPeriodos::route('/'),
            'create' => Pages\CreateProgacaPeriodo::route('/create'),
            'edit' => Pages\EditProgacaPeriodo::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    
}
