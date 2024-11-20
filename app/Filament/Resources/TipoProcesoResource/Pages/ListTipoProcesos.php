<?php

namespace App\Filament\Resources\TipoProcesoResource\Pages;

use App\Filament\Resources\TipoProcesoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipoProcesos extends ListRecords
{
    protected static string $resource = TipoProcesoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
