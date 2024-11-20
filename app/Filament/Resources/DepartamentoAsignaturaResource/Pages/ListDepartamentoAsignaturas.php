<?php

namespace App\Filament\Resources\DepartamentoAsignaturaResource\Pages;

use App\Filament\Resources\DepartamentoAsignaturaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDepartamentoAsignaturas extends ListRecords
{
    protected static string $resource = DepartamentoAsignaturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
