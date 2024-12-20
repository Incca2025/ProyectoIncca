<?php

namespace App\Filament\Resources\EstadoSeguimientoResource\Pages;

use App\Filament\Resources\EstadoSeguimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEstadoSeguimiento extends CreateRecord
{
    protected static string $resource = EstadoSeguimientoResource::class;

    protected function getRedirectUrl(): string
    {
        return EstadoSeguimientoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
