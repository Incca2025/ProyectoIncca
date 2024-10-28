<?php

namespace App\Filament\Resources\CapacidadExcepcionalResource\Pages;

use App\Filament\Resources\CapacidadExcepcionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCapacidadExcepcionals extends ListRecords
{
    protected static string $resource = CapacidadExcepcionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
