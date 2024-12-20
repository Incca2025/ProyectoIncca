<?php

namespace App\Filament\Resources\AsignaturaResource\Pages;

use App\Filament\Resources\AsignaturaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAsignatura extends CreateRecord
{
    protected static string $resource = AsignaturaResource::class;

    protected function getRedirectUrl(): string
    {
        return AsignaturaResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
