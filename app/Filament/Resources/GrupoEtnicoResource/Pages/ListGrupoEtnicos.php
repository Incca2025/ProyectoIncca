<?php

namespace App\Filament\Resources\GrupoEtnicoResource\Pages;

use App\Filament\Resources\GrupoEtnicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGrupoEtnicos extends ListRecords
{
    protected static string $resource = GrupoEtnicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
