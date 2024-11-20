<?php

namespace App\Filament\Resources\InteresadoResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Seguimiento;
use App\Models\TipoSeguimiento;
use Illuminate\Support\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Group;
use Illuminate\Support\Facades\Cache;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\InteresadoResource;
use App\Filament\Resources\SeguimientoResource;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class SeguimientosRelationManager extends RelationManager
{
    protected static string $relationship = 'seguimientos';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        Forms\Components\Select::make('IdIntTipSeguimiento')
                            ->relationship('tipoSeguimiento', 'DesTipSeguimiento')    
                            ->label(label: 'Tipo de Contacto')
                            ->live()
                            ->preload()
                            ->afterStateUpdated(function (callable $set, $state) {
                                $instructivos = Cache::rememberForever('instructivos', function () {
                                    return TipoSeguimiento::pluck('InstTipSeguimiento', 'IdIntTipSeguimiento');
                                });
                                $set('InstTipSeguimiento', $instructivos[$state] ?? null); 
                            })
                            ->required(),
                        Forms\Components\TextArea::make('ObsIntSeguimiento')
                            ->label('Observación')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\TextArea::make('InstTipSeguimiento')
                            ->label('Instructivo')
                            ->rows(4)
                            ->readOnly()
                            // ->default(fn (Get $get) => TipoSeguimiento::query()
                            //     ->where('IdIntTipSeguimiento', $get('IdIntTipSeguimiento'))
                            //     ->value('InstTipSeguimiento'))
                            // ->live()
                            // ->nullable()
                    ])
                ])->columnSpanFull()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('IdInteresado')
            ->columns([
                Tables\Columns\TextColumn::make('tipoSeguimiento.DesTipSeguimiento')
                    ->label('Tipo de Contacto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha del Seguimiento')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ObsIntSeguimiento')
                    ->label('Observaciones')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->createAnother(false)
                    ->modalSubmitActionLabel('Grabar')
                // Action::make('Nuevo')
                //     ->url(fn () => SeguimientoResource::getUrl('create'))
                //     ->icon('heroicon-o-plus')
                //     ->color('primary'),
            ])
            ->actions([
                // Action::make('Editar')
                //     ->url(fn (Seguimiento $record): string => SeguimientoResource::getUrl('edit', ['record' => $record]))
                //     ->icon('heroicon-o-pencil-square'),
                // Action::make('Nuevo Seguimiento')
                //     ->url(SeguimientoResource::getUrl('create'))
                //     ->icon('heroicon-o-arrow-left')
                //     ->color('danger'),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

}
