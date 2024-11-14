<?php

namespace App\Filament\Resources\SeguimientoResource\Pages;

use App\Filament\Resources\SeguimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeguimientos extends ListRecords
{
    protected static string $resource = SeguimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
