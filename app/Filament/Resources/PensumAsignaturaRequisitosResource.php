<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pensum;
use Illuminate\Validation\Rules\Unique;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Models\PensumAsignaturaRequisitos;
use Filament\Tables\Enums\ActionsPosition;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PensumAsignaturaRequisitosResource\Pages;
use App\Filament\Resources\PensumAsignaturaRequisitosResource\RelationManagers;

class PensumAsignaturaRequisitosResource extends Resource
{
    protected static ?string $model = PensumAsignaturaRequisitos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('IdPen_Asignatura') 
                    // ->relationship('pensumasignatura.pensum', 'DesPensum')
                    ->label(label: 'Pensum')
                    ->options(fn () => Pensum::pluck('desPensum', 'IdPensum'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('IdAsignatura')
                    ->relationship('asignaturas', 'DesAsignatura')
                    ->label(label: 'Asignatura')
                    ->searchable()
                    ->preload()
                    ->unique(
                        modifyRuleUsing: function (Unique $rule, $livewire) {
                            return $rule->where('IdPen_Asignatura', $livewire->data['IdPen_Asignatura'] ?? null);
                        }
                    )
                    ->validationMessages([
                        'unique' => 'La combinación del Pensum y de la Asignatura ya existe.',
                    ])
                    ->required(),
                Forms\Components\Select::make('Prerequisito')
                    ->label(label: 'Tipo de Requisito')
                    ->options([
                        0 => 'Prerequisito',
                        1 => 'Correquisito',
                    ])
                    ->default(0)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pensumasignatura.pensum.desPensum')
                    ->label(label: 'Pensum')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('asignaturas.DesAsignatura')
                    ->label(label: 'Asignatura')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Prerequisito')
                    ->label(label: 'Tipo de Requisito')
                    ->formatStateUsing(fn ($state) => $state === 0 ? 'Prerequisito' : 'Correquisito')
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
            'index' => Pages\ListPensumAsignaturaRequisitos::route('/'),
            'create' => Pages\CreatePensumAsignaturaRequisitos::route('/create'),
            'edit' => Pages\EditPensumAsignaturaRequisitos::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    
}
