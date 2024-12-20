<?php

namespace App\Filament\Resources\EstudEstadoResource\Pages;

use App\Filament\Resources\EstudEstadoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEstudEstado extends CreateRecord
{
    protected static string $resource = EstudEstadoResource::class;

    protected function getRedirectUrl(): string
    {
        return EstudEstadoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
