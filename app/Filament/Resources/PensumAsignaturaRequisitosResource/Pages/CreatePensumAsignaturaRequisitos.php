<?php

namespace App\Filament\Resources\PensumAsignaturaRequisitosResource\Pages;

use App\Filament\Resources\PensumAsignaturaRequisitosResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePensumAsignaturaRequisitos extends CreateRecord
{
    protected static string $resource = PensumAsignaturaRequisitosResource::class;

    protected function getRedirectUrl(): string
    {
        return PensumAsignaturaRequisitosResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
