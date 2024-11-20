<?php

namespace App\Filament\Resources\AsignaturaResource\Pages;

use App\Filament\Resources\AsignaturaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAsignaturas extends ListRecords
{
    protected static string $resource = AsignaturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
