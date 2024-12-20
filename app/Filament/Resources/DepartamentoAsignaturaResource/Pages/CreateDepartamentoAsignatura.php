<?php

namespace App\Filament\Resources\DepartamentoAsignaturaResource\Pages;

use App\Filament\Resources\DepartamentoAsignaturaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDepartamentoAsignatura extends CreateRecord
{
    protected static string $resource = DepartamentoAsignaturaResource::class;

    protected function getRedirectUrl(): string
    {
        return DepartamentoAsignaturaResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
