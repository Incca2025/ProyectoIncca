<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstudianteResource\Pages;
use App\Filament\Resources\EstudianteResource\RelationManagers;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Persona;
use App\Models\Estudiante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Filament\Tables\Enums\ActionsPosition;

class EstudianteResource extends Resource
{
    protected static ?string $model = Estudiante::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Datos del Estudiante')
                    ->schema([
                        Forms\Components\TextInput::make('CodEstudiante')
                            ->label('Código del Estudiante')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('EmailEstudiante')
                            ->label('Correo electrónico del Estudiante')
                            ->required()
                            ->email()
                            ->maxLength(80),
                        Forms\Components\Select::make('IdEstEstudiante')
                            ->relationship('estud_estados', 'DesEstEstudiante')
                            ->label('Estado del Estudiante')
                            ->required(),
                    ]),
                Forms\Components\Fieldset::make('Datos de la Persona')
                    ->relationship('personas') // Accede a la relación con Persona
                    ->schema([
                        Forms\Components\Select::make('IdTipDocIdentidad')
                            ->relationship('tipoDocumento', 'DesDocidentidad')
                            ->label('Tipo de Documento')
                            ->required(),
                        Forms\Components\TextInput::make('NumDocIdentidad')
                            ->label('Número de Documento')
                            ->required()
                            ->unique(ignorable: fn ($record) => $record)
                            ->maxLength(45),
                        Forms\Components\TextInput::make('PriApellido')
                            ->label('Primer Apellido')
                            ->required()
                            ->maxLength(45),
                        Forms\Components\TextInput::make('SegApellido')
                            ->label('Segundo Apellido')
                            ->maxLength(45),
                            Forms\Components\TextInput::make('PriNombre')
                            ->required()
                            ->label('Primer Nombre')
                            ->maxLength(45),
                        Forms\Components\TextInput::make('SegNombre')
                            ->label('Segundo Nombre')
                            ->maxLength(45),
                        Forms\Components\TextInput::make('DirResidencia')
                            ->required()
                            ->label(label: 'Dirección de Residencia')
                            ->maxLength(200),
                        Forms\Components\TextInput::make('TelResidencia')
                            ->label('Teléfono Residencia')
                            ->maxLength(25),
                        Forms\Components\TextInput::make('MailPersonal')
                            ->email()
                            ->required()
                            ->label('Correo Electrónico Personal')
                            ->maxLength(45),
                        Forms\Components\DatePicker::make('FecNacimiento')
                            ->label('Fecha de Nacimiento')
                            ->required(),
                        Forms\Components\TextInput::make('TelCelular')
                            ->label('Teléfono Celular')
                            ->required()
                            ->maxLength(25),
                        Forms\Components\Select::make('IdPaisNacimiento')
                            ->relationship('paisNacimiento', 'DesPais')
                            ->searchable()
                            ->label('País de Nacimiento')
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set, $state) {
                                $set('IdTipDeptoNacimiento', null); 
                                $set('IdTipMunNacimiento', null);
                            })
                            ->afterStateHydrated(function (Set $set, $state) {
                                $set('IdPaisNacimiento', null);
                                $set('IdTipDeptoNacimiento', null);
                                $set('IdTipMunNacimiento', null);
                                $set('OtroDeptoNacimiento', null);
                                $set('OtroMunNacimiento', null);
                            })
                            ->required(),
                        Forms\Components\Select::make('IdTipDeptoNacimiento')
                            ->label('Departamento de Nacimiento')
                            ->options(fn (Get $get): Collection => Departamento::query()
                                ->where('IdTipPais', $get('IdPaisNacimiento'))
                                ->pluck('DesDepartamento', 'IdTipDepartamento'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->disabled(fn (Get $get) => $get('IdPaisNacimiento') !== '1')
                            ->nullable()
                            ->required(fn (Get $get) => $get('IdPaisNacimiento') === '1'),
                        Forms\Components\Select::make('IdTipMunNacimiento')
                            ->label('Municipio de Nacimiento')
                            ->options(fn (Get $get): Collection => Municipio::query()
                                ->where('IdTipDepartamento', $get('IdTipDeptoNacimiento'))
                                ->pluck('DesMunicipio', 'IdTipMunicipio'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->disabled(fn (Get $get) => $get('IdPaisNacimiento') !== '1')
                            ->nullable()
                            ->required(fn (Get $get) => $get('IdPaisNacimiento') === '1'),
                        Forms\Components\TextInput::make('OtroDeptoNacimiento')
                            ->label('Otro Departamento de Nacimiento')
                            ->maxLength(45)
                            ->disabled(fn (Get $get) => !$get('IdPaisNacimiento') || $get('IdPaisNacimiento') === '1'),
                        Forms\Components\TextInput::make('OtroMunNacimiento')
                            ->label('Otro Municipio de Nacimiento')
                            ->maxLength(45)
                            ->disabled(fn (Get $get) => !$get('IdPaisNacimiento') || $get('IdPaisNacimiento') === '1'),
                        Forms\Components\Select::make('IdPaisResidencia')
                            ->relationship('paisResidencia', 'DesPais')
                            ->label('País de Residencia')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set, $state) {
                                $set('IdTipDeptoResidencia', null);
                                $set('IdTipMunResidencia', null);
                            })
                            ->afterStateHydrated(function (Set $set, $state) {
                                $set('IdPaisResidencia', null);
                                $set('IdTipDeptoResidencia', null);
                                $set('IdTipMunResidencia', null);
                                $set('OtroDeptoResidencia', null);
                                $set('OtroMunResidencia', null);
                            })
                            ->required(),   
                        Forms\Components\Select::make('IdTipDeptoResidencia')
                            ->label('Departamento de Residencia')
                            ->options(fn (Get $get): Collection => Departamento::query()
                                ->where('IdTipPais', $get('IdPaisResidencia'))
                                ->pluck('DesDepartamento', 'IdTipDepartamento'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->disabled(fn (Get $get) => $get('IdPaisResidencia') !== '1')
                            ->nullable()
                            ->required(fn (Get $get) => $get('IdPaisResidencia') === '1'),
                        Forms\Components\Select::make('IdTipMunResidencia')
                            ->label('Municipio de Residencia')
                            ->options(fn (Get $get): Collection => Municipio::query()
                                ->where('IdTipDepartamento', $get('IdTipDeptoResidencia'))
                                ->pluck('DesMunicipio', 'IdTipMunicipio'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->disabled(fn (Get $get) => $get('IdPaisResidencia') !== '1')
                            ->nullable()
                            ->required(fn (Get $get) => $get('IdPaisResidencia') === '1'),
                        Forms\Components\TextInput::make('OtroDeptoResidencia')
                            ->label('Otro Departamento de Residencia')
                            ->disabled(fn (Get $get) => !$get('IdPaisResidencia') || $get('IdPaisResidencia') === '1')
                            ->maxLength(45),
                        Forms\Components\TextInput::make('OtroMunResidencia')
                            ->label('Otro Municipio de Residencia')
                            ->disabled(fn (Get $get) => !$get('IdPaisResidencia') || $get('IdPaisResidencia') === '1')
                            ->maxLength(45),
                        Forms\Components\TextInput::make('DocExpedidoEn')
                            ->label('Documento de Identidad Expedido en')
                            ->required()
                            ->maxLength(45),
                        Forms\Components\TextInput::make('Nacionalidad')
                            ->maxLength(45),
                        Forms\Components\Select::make('IdTipCapExcepcional')
                            ->relationship('capacidadExcepcional', 'DesCapExcepcional')
                            ->required(),
                        Forms\Components\Select::make('IdTipComNegra')
                            ->relationship('comunidadNegra', 'DesComNegra')
                            ->required(),
                        Forms\Components\Select::make('IdTipConDiscapacidad')
                            ->relationship('conDiscapacidad', 'DesConDiscapacidad')
                            ->required(),
                        Forms\Components\Select::make('IdTipDiscapacidad')
                            ->relationship('discapacidad', 'DesDiscapacidad')
                            ->required(),
                        Forms\Components\Select::make('IdTipEstCivil')
                            ->relationship('estadoCivil', 'DesEstCivil')
                            ->required(),
                        Forms\Components\Select::make('IdTipEstrato')
                            ->relationship('estrato', 'DesEstrato')
                            ->required(),
                        Forms\Components\Select::make('IdTipGenBiologico')
                            ->relationship('generoBiologico', 'DesGenBiologico')
                            ->label('Género Biológico')
                            ->required(),
                        Forms\Components\Select::make('IdTipGrupEtnico')
                            ->relationship('grupoEtnico', 'DesGrupEtnico')
                            ->label('Grupo Étnico')
                            ->required(),
                        Forms\Components\Select::make('IdTipPueIndigena')
                            ->relationship('puebloIndigena', 'DesPueIndigena')
                            ->label('Pueblo Indígena')
                            ->required(),
                        Forms\Components\Select::make('IdTipVeteranos')
                            ->relationship('leyVeteranos', 'DesVeterano')
                            ->required(),
                        Forms\Components\Select::make('IdTipZonaResidencia')
                            ->relationship('zonaResidencia', 'DesZonaResidencial')
                            ->required(),
                    ]),
            ]);         
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('IdPersona')
                    ->label('Id del Estudiante')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('CodEstudiante')
                    ->label('Código del Estudiante')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('EmailEstudiante')
                    ->label('Correo electrónico del Estudiante')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('estud_estados.DesEstEstudiante')
                    ->label('Estado del Estudiante')
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
            'index' => Pages\ListEstudiantes::route('/'),
            // 'create' => Pages\CreateEstudiante::route('/create'),
            'edit' => Pages\EditEstudiante::route('/{record}/edit'),
        ];
    }
}

