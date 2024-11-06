<?php

namespace App\Filament\Resources\TipoSeguimientoResource\Pages;

use App\Filament\Resources\TipoSeguimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipoSeguimientos extends ListRecords
{
    protected static string $resource = TipoSeguimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
