<?php

namespace App\Filament\Resources\PensumAsignaturaRequisitosResource\Pages;

use App\Filament\Resources\PensumAsignaturaRequisitosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPensumAsignaturaRequisitos extends ListRecords
{
    protected static string $resource = PensumAsignaturaRequisitosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
