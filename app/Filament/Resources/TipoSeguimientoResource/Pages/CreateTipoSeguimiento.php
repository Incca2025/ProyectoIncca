<?php

namespace App\Filament\Resources\TipoSeguimientoResource\Pages;

use App\Filament\Resources\TipoSeguimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTipoSeguimiento extends CreateRecord
{
    protected static string $resource = TipoSeguimientoResource::class;

    protected function getRedirectUrl(): string
    {
        return TipoSeguimientoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
