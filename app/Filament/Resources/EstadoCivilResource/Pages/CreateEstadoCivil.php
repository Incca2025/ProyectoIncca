<?php

namespace App\Filament\Resources\EstadoCivilResource\Pages;

use App\Filament\Resources\EstadoCivilResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEstadoCivil extends CreateRecord
{
    protected static string $resource = EstadoCivilResource::class;

    protected function getRedirectUrl(): string
    {
        return EstadoCivilResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
