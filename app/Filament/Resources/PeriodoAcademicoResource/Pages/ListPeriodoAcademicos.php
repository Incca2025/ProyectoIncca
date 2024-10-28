<?php

namespace App\Filament\Resources\PeriodoAcademicoResource\Pages;

use App\Filament\Resources\PeriodoAcademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriodoAcademicos extends ListRecords
{
    protected static string $resource = PeriodoAcademicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
