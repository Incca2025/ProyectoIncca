<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pensum;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProgacaPeriodo;
use Illuminate\Validation\Rules\Unique;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\PensumResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PensumResource\RelationManagers;

class PensumResource extends Resource
{
    protected static ?string $model = Pensum::class;

    // protected static ?string $navigationLabel = 'Pensums';

    // protected static ?string $modelLabel = 'Personas';

    protected static ?string $navigationGroup = 'Programas Académicos';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('IdProgAcademico')
                    ->relationship('programas', 'NomProgAcademico')
                    ->searchable()
                    ->label('Programa Académico')
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('perAcademico_Inicial', null); 
                        $set('perAcademico_Final', null); 
                    })
                    ->required(),
                Forms\Components\Select::make('perAcademico_Inicial')
                    ->label('Periodo Académico Inicial')
                    ->options(fn (Get $get): Collection => ProgacaPeriodo::query()
                        ->where('IdProgAcademico', $get('IdProgAcademico'))
                        ->pluck('Peracademico', 'IdProgAcaPeriodo'))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('perAcademico_Final')
                    ->label('Periodo Académico Final')
                    ->options(fn (Get $get): Collection => ProgacaPeriodo::query()
                        ->where('IdProgAcademico', $get('IdProgAcademico'))
                        ->pluck('Peracademico', 'IdProgAcaPeriodo'))
                    ->searchable()
                    ->preload()
                    ->live(),
                Forms\Components\TextInput::make('desPensum')
                    ->label('Descripción del Pensum')
                    ->required()
                    ->maxLength(40),
                Forms\Components\TextInput::make('numCredAprob')
                    ->label('Número de créditos para aprobación')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                Forms\Components\TextInput::make('promMinimo')
                    ->label('Promedio Mínimo')
                    ->required()
                    ->numeric()
                    ->inputMode('decimal')
                    ->minValue(0)
                    ->maxValue(5),
                Forms\Components\TextInput::make('numPeriodos')
                    ->label('Número de periodos')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                Forms\Components\TextInput::make('CodPensum')
                    ->label('Código del Pensum')
                    ->maxLength(15)
                    ->unique(
                        modifyRuleUsing: function (Unique $rule, $livewire) {
                            return $rule->where('IdProgAcademico', $livewire->data['IdProgAcademico'] ?? null);
                        }
                    )
                    ->validationMessages([
                        'unique' => 'La combinación de Programa Académico y Código del Pensum ya existe.',
                    ])
                    ->required(),
                Forms\Components\Select::make('IdTipPeriodos')
                    ->relationship('periodos', 'DesTipPeriodos')
                    ->label('Periodos')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('programas.NomProgAcademico')
                    ->label('Programa')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('progacaperiodos.Peracademico')
                    ->label('Per. Inicial')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('perAcademico_Final')
                    ->label('Per. Final')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('desPensum')
                    ->label('Descripción')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('numCredAprob')
                    ->label('Créditos aprobación')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('promMinimo')
                    ->label('Prom. Mínimo')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('numPeriodos')
                    ->label('Periodos')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('CodPensum')
                    ->label('Código')
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
                Action::make('verPensumAsignaturas')
                    ->label('Pensum Asignaturas')
                    ->url(fn () => PensumAsignaturaResource::getUrl('index'))
                    ->icon('heroicon-o-arrow-right'),
                // Action::make('Asignaturas')
                //     ->url(fn (Pensum $record) => PensumDetalleResource::getUrl('index', ['IdPensum' => $record->id]))
                //     ->icon('heroicon-o-arrow-right')
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
            'index' => Pages\ListPensums::route('/'),
            'create' => Pages\CreatePensum::route('/create'),
            'edit' => Pages\EditPensum::route('/{record}/edit'),
        ];
    }
}
