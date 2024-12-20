<?php

namespace App\Filament\Resources\SeguimientoResource\Pages;

use App\Filament\Resources\SeguimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSeguimiento extends CreateRecord
{
    protected static string $resource = SeguimientoResource::class;

    protected function getRedirectUrl(): string
    {
        return SeguimientoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
