<?php

namespace App\Filament\Resources\ZonaResidenciaResource\Pages;

use App\Filament\Resources\ZonaResidenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZonaResidencias extends ListRecords
{
    protected static string $resource = ZonaResidenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
