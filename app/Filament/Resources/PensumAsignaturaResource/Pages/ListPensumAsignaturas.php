<?php

namespace App\Filament\Resources\PensumAsignaturaResource\Pages;

use App\Filament\Resources\PensumAsignaturaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPensumAsignaturas extends ListRecords
{
    protected static string $resource = PensumAsignaturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
