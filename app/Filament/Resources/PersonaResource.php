<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonaResource\Pages;
use App\Filament\Resources\PersonaResource\RelationManagers;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Persona;
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

class PersonaResource extends Resource
{
    protected static ?string $model = Persona::class;
    
    protected static ?string $navigationLabel = 'Personas';

    protected static ?string $modelLabel = 'Personas';

    protected static ?string $navigationGroup = 'Personas';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('IdTipDocIdentidad')
                    ->relationship('tipoDocumento', 'DesDocidentidad')
                    ->label('Tipo de Documento')
                    ->required(),
                Forms\Components\TextInput::make('NumDocIdentidad')
                    ->required()
                    ->label('Documento de Identidad')
                    ->unique(ignorable: fn ($record) => $record)
                    ->maxLength(45),
                Forms\Components\TextInput::make('PriApellido')
                    ->required()
                    ->label('Primer Apellido')
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
                Forms\Components\TextInput::make('MailInstitucional')
                    ->email()
                    ->required()
                    ->label('Correo Electrónico Institucional')
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

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipoDocumento.DesDocidentidad')
                    ->label('Tipo de Documento')
                    ->sortable(),
                Tables\Columns\TextColumn::make('NumDocIdentidad')
                    ->label('Documento de Identidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('NumDocIdentidad_Num')
                    ->label('Documento de Identidad Númerico')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PriApellido')
                    ->label('Primer Apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('SegApellido')
                    ->label('Segundo Apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('PriNombre')
                    ->label('Primer Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('SegNombre')
                    ->label('Segundo Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DirResidencia')
                    ->label(label: 'Dirección de Residencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('TelResidencia')
                    ->label('Teléfono Residencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('MailPersonal')
                    ->label('Correo Electrónico Personal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('MailInstitucional')
                    ->label('Correo Electrónico Institucional')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FecNacimiento')
                    ->label('Fecha de Nacimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('TelCelular')
                    ->label('Teléfono Celular')
                    ->searchable(),
                Tables\Columns\TextColumn::make('paisNacimiento.DesPais')
                    ->label('País de Nacimiento')
                    ->sortable(),
                Tables\Columns\TextColumn::make('departamentoNacimiento.DesDepartamento')
                    ->label('Departamento de Nacimiento')
                    ->sortable(),
                Tables\Columns\TextColumn::make('municipioNacimiento.DesMunicipio')
                    ->label('Municipio de Nacimiento')
                    ->sortable(),
                Tables\Columns\TextColumn::make('OtroDeptoNacimiento')
                    ->label('Otro Departamento de Nacimiento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('OtroMunNacimiento')
                    ->label('Otro Municipio de Nacimiento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('paisResidencia.DesPais')
                    ->label('País de Residencia')
                    ->sortable(),
                Tables\Columns\TextColumn::make('departamentoResidencia.DesDepartamento')
                    ->label('Departamento de Residencia')
                    ->sortable(),
                Tables\Columns\TextColumn::make('municipioResidencia.DesMunicipio')
                    ->label('Municipio de Residencia')
                    ->sortable(),
                Tables\Columns\TextColumn::make('OtroDeptoResidencia')
                    ->label('Otro Departamento de Residencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('OtroMunResidencia')
                    ->label('Otro Municipio de Residencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DocExpedidoEn')
                    ->label('Documento de Identidad Expedido en')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Nacionalidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('capacidadExcepcional.DesCapExcepcional')
                    ->sortable(),
                Tables\Columns\TextColumn::make('comunidadNegra.DesComNegra')
                    ->sortable(),
                Tables\Columns\TextColumn::make('conDiscapacidad.DesConDiscapacidad')
                    ->sortable(),
                Tables\Columns\TextColumn::make('discapacidad.DesDiscapacidad')
                    ->sortable(),
                Tables\Columns\TextColumn::make('estadoCivil.DesEstCivil')
                    ->sortable(),
                Tables\Columns\TextColumn::make('estrato.DesEstrato')
                    ->sortable(),
                Tables\Columns\TextColumn::make('generoBiologico.DesGenBiologico')
                    ->label('Género Biológico')
                    ->sortable(),
                Tables\Columns\TextColumn::make('grupoEtnico.DesGrupEtnico')
                    ->label('Grupo Étnico')
                    ->sortable(),
                Tables\Columns\TextColumn::make('puebloIndigena.DesPueIndigena')
                    ->label('Pueblo Indígena')
                    ->sortable(),
                Tables\Columns\TextColumn::make('leyVeteranos.DesVeterano')
                    ->sortable(),
                Tables\Columns\TextColumn::make('zonaResidencia.DesZonaResidencial')
                    ->sortable(),
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
            'index' => Pages\ListPersonas::route('/'),
            'create' => Pages\CreatePersona::route('/create'),
            'edit' => Pages\EditPersona::route('/{record}/edit'),
        ];
    }
}