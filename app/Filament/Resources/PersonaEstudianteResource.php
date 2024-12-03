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

    protected static ?string $navigationGroup = 'Personas';

    public static function form(Form $form): Form
    {

        // $interesadoId = request()->query('record');
        // $interesado = Interesado::find($interesadoId);
        // dd( $interesadoId);

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
                    ->default(request()->get('primer_apellido'))
                    ->required()
                    ->label('Primer Apellido')
                    ->maxLength(45),
                Forms\Components\TextInput::make('SegApellido')
                    ->default(request()->get('segundo_apellido'))
                    ->label('Segundo Apellido')
                    ->maxLength(45),
                Forms\Components\TextInput::make('PriNombre')
                    ->default(request()->get('primer_nombre')) 
                    ->required()
                    ->label('Primer Nombre')
                    ->maxLength(45),
                Forms\Components\TextInput::make('SegNombre')
                    ->default(request()->get('segundo_nombre')) 
                    ->label('Segundo Nombre')
                    ->maxLength(45),
                Forms\Components\TextInput::make('MailPersonal')
                    ->default(request()->get('email'))
                    ->email()
                    ->required()
                    ->label('Correo Electrónico Personal')
                    ->maxLength(45),
                Forms\Components\TextInput::make('TelCelular')
                    ->default(request()->get('celular'))
                    ->label('Teléfono Celular')
                    ->required()
                    ->maxLength(25),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
