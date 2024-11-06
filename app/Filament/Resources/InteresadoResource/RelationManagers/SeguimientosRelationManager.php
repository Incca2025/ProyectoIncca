<?php

namespace App\Filament\Resources\InteresadoResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Seguimiento;
use Filament\Tables\Actions\Action;
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
               //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Id_Interesado')
            ->columns([
                Tables\Columns\TextColumn::make('tipoSeguimiento.DesTipSeguimiento')
                    ->label('Tipo Seguimiento')
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
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Action::make('Nuevo Seguimiento')
                    ->url(fn (Seguimiento $record): string => SeguimientoResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye'),
                // Action::make('Salir')
                //     ->url(InteresadoResource::getUrl('index'))
                //     ->icon('heroicon-o-arrow-left')
                //     ->color('danger'),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
