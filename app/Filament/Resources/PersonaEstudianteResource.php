<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Persona;
use Filament\Forms\Form;
use App\Models\Interesado;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PersonaEstudianteResource\Pages;
use App\Filament\Resources\PersonaEstudianteResource\RelationManagers;

class PersonaEstudianteResource extends Resource
{
    protected static ?string $model = Persona::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Persona y Estudiante desde Interesado';

    protected static ?string $modelLabel = 'Persona y Estudiante desde Interesado';

    protected static ?string $navigationGroup = null;

    protected static bool $shouldRegisterNavigation = false;


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
                    // ->default(request()->get('primer_apellido'))
                    ->default(session('primer_apellido'))
                    ->required()
                    ->label('Primer Apellido')
                    ->maxLength(45),
                Forms\Components\TextInput::make('SegApellido')
                    // ->default(request()->get('segundo_apellido'))
                    ->default(session('segundo_apellido'))
                    ->label('Segundo Apellido')
                    ->maxLength(45),
                Forms\Components\TextInput::make('PriNombre')
                    // ->default(request()->get('primer_nombre')) 
                    ->default(session('primer_nombre'))
                    ->required()
                    ->label('Primer Nombre')
                    ->maxLength(45),
                Forms\Components\TextInput::make('SegNombre')
                    // ->default(request()->get('segundo_nombre')) 
                    ->default(session('segundo_nombre'))
                    ->label('Segundo Nombre')
                    ->maxLength(45),
                Forms\Components\TextInput::make('MailPersonal')
                    // ->default(request()->get('email'))
                    ->default(session('email'))
                    ->email()
                    ->required()
                    ->label('Correo Electrónico Personal')
                    ->maxLength(45),
                Forms\Components\TextInput::make('TelCelular')
                    // ->default(request()->get('celular'))
                    ->default(session('celular'))
                    ->label('Teléfono Celular')
                    ->required()
                    ->maxLength(25),
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
                Tables\Columns\TextColumn::make('MailPersonal')
                    ->label('Correo Electrónico Personal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('TelCelular')
                    ->label('Teléfono Celular')
                    ->searchable(),
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
            'index' => Pages\ListPersonaEstudiantes::route('/'),
            'create' => Pages\CreatePersonaEstudiante::route('/create'),
            'edit' => Pages\EditPersonaEstudiante::route('/{record}/edit'),
        ];
    }
}
