<?php

namespace App\Filament\Resources\ProgramaAcademicoResource\Pages;

use App\Filament\Resources\ProgramaAcademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgramaAcademicos extends ListRecords
{
    protected static string $resource = ProgramaAcademicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
