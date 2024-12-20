<?php

namespace App\Filament\Resources\ZonaResidenciaResource\Pages;

use App\Filament\Resources\ZonaResidenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateZonaResidencia extends CreateRecord
{
    protected static string $resource = ZonaResidenciaResource::class;

    protected function getRedirectUrl(): string
    {
        return ZonaResidenciaResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
