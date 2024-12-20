<?php

namespace App\Filament\Resources\PensumAsignaturaResource\Pages;

use App\Filament\Resources\PensumAsignaturaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePensumAsignatura extends CreateRecord
{
    protected static string $resource = PensumAsignaturaResource::class;

    protected function getRedirectUrl(): string
    {
        return PensumAsignaturaResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
