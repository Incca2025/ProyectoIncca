<?php

namespace App\Filament\Resources\TipoDocumentoResource\Pages;

use App\Filament\Resources\TipoDocumentoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTipoDocumento extends CreateRecord
{
    protected static string $resource = TipoDocumentoResource::class;

    protected function getRedirectUrl(): string
    {
        return TipoDocumentoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
