<?php

namespace App\Filament\Resources\EstudEstadoResource\Pages;

use App\Filament\Resources\EstudEstadoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstudEstados extends ListRecords
{
    protected static string $resource = EstudEstadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
