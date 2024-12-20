<?php

namespace App\Filament\Resources\CapacidadExcepcionalResource\Pages;

use App\Filament\Resources\CapacidadExcepcionalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCapacidadExcepcional extends CreateRecord
{
    protected static string $resource = CapacidadExcepcionalResource::class;

    protected function getRedirectUrl(): string
    {
        return CapacidadExcepcionalResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
