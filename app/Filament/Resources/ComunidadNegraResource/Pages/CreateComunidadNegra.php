<?php

namespace App\Filament\Resources\ComunidadNegraResource\Pages;

use App\Filament\Resources\ComunidadNegraResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComunidadNegra extends CreateRecord
{
    protected static string $resource = ComunidadNegraResource::class;

    protected function getRedirectUrl(): string
    {
        return ComunidadNegraResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
