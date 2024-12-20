<?php

namespace App\Filament\Resources\TipoProcesoResource\Pages;

use App\Filament\Resources\TipoProcesoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTipoProceso extends CreateRecord
{
    protected static string $resource = TipoProcesoResource::class;

    protected function getRedirectUrl(): string
    {
        return TipoProcesoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
