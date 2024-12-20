<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\PensumAsignatura;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PensumDetalleResource\Pages;
use App\Filament\Resources\PensumDetalleResource\RelationManagers;

// class PensumDetalleResource extends Resource
// {
//     protected static ?string $model = PensumAsignatura::class;

//     protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 //
//             ]);
//     }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             Tables\Columns\TextColumn::make('numPeriodo')
    //                 ->label('Número de periodo')
    //                 ->numeric()
    //                 ->sortable()
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('asignaturas.DesAsignatura')
    //                 ->label('Asignatura')
    //                 ->sortable()
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('numCreditos')
    //                 ->label('Créditos')
    //                 ->sortable()
    //                 ->numeric(),
    //             Tables\Columns\TextColumn::make('NumCreditosPreRequisito')
    //                 ->label(label: 'Cred. pre-requisito')
    //                 ->numeric()
    //                 ->sortable()
    //                 ->searchable(),
    //             Tables\Columns\TextColumn::make('numPeriodo')
    //                 ->label('Periodo')
    //                 ->sortable(),
    //         ])
    //         ->filters([
    //             SelectFilter::make('IdPensum')
    //                 ->default(fn () => request('IdPensum'))
    //                 ->relationship('pensum', 'desPensum')
    //                 ->label('Pensum'),
    //         ])
    //         ->actions([
    //             Tables\Actions\EditAction::make(),
    //         ]);
    // }

    // public static function getRelations(): array
    // {
    //     return [
    //         //
    //     ];
    // }

    // public static function getPages(): array
    // {
    //     return [
    //         'index' => Pages\ListPensumDetalles::route('/'),
    //         'create' => Pages\CreatePensumDetalle::route('/create'),
    //         'edit' => Pages\EditPensumDetalle::route('/{record}/edit'),
    //     ];
    // }
// }
