<?php

namespace App\Filament\Resources\PersonaEstudianteResource\Pages;

use App\Filament\Resources\PersonaEstudianteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonaEstudiantes extends ListRecords
{
    protected static string $resource = PersonaEstudianteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
