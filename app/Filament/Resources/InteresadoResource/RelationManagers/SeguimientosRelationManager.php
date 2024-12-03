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
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use App\Filament\Resources\InteresadoResource;
use App\Filament\Resources\SeguimientoResource;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;

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
                        // Forms\Components\Select::make('IdInteresado') 
                        //     ->relationship('interesado', 'IdIntEstSeguimiento')  
                        //     ->label(label: 'Estado del Seguimiento')
                        //     ->live() 
                        //     ->required(),
                        Forms\Components\Textarea::make('ObsIntSeguimiento')
                            ->label('Observación')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\Textarea::make('InstTipSeguimiento')
                            ->label('Instructivo')
                            ->rows(4)
                            ->readOnly(),
                        // Forms\Components\Actions::make([
                        //     Forms\Components\Actions\Action::make('crearPrematricula')
                        //         ->label('Crear Prematricula')
                        //         // ->url(fn () => route('create')) 
                        //         ->visible(fn (Get $get) => $get('DesIntEstSeguimiento') == 5)
                        //         ->action(function (array $data) {
                        //             // Crear el registro en la tabla 'seguimiento'
                        //             $seguimiento = Seguimiento::create([
                        //                 'IdInteresado' => $this->ownerRecord->IdInteresado, // ID del interesado relacionado
                        //                 'IdIntTipSeguimiento' => $data['IdIntTipSeguimiento'],
                        //                 'ObsIntSeguimiento' => $data['ObsIntSeguimiento'],
                        //                 // Agrega otros campos si es necesario
                        //             ]);
                        
                        //             // Actualizar el estado del interesado
                        //             $this->ownerRecord->update([
                        //                 'IdIntEstSeguimiento' => $data['DesIntEstSeguimiento'], // Cambia según tu lógica
                        //             ]);
                        
                        //             // Redirigir a una ruta específica, pasando el ID del interesado
                        //             // return redirect()->route('ruta.deseada', ['id' => $this->ownerRecord->IdInteresado]);
                        //         })
                        //         ->successNotification(
                        //             Notification::make()
                        //                 ->title('Prematricula creada')
                        //                 ->body('El seguimiento y actualización se realizaron con éxito.')
                        //         ),
                        // ]),
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
                    ->createAnother(condition: false)
                    ->modalSubmitActionLabel(label: 'Grabar')
                    // ->after(function (Seguimiento $record) {
                    //     $nuevoEstado = $data['DesIntEstSeguimiento'] ?? null; // Captura del formulario
                    //     // Lógica adicional después de crear el seguimiento
                        
                    //     $record->interesado()->update([
                    //         'IdIntEstSeguimiento' => $nuevoEstado, // Actualiza el estado del interesado
                    //     ]);

                    //     // Redirige a otra página
                    //     // return redirect()->route('ruta.formulario.adicional', ['id' => $record->interesado->id]);
                    // }),
                
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
            ], position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

}
