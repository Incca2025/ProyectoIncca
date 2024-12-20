<?php

namespace App\Filament\Resources\ProgramaAcademicoResource\Pages;

use App\Filament\Resources\ProgramaAcademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProgramaAcademico extends CreateRecord
{
    protected static string $resource = ProgramaAcademicoResource::class;

    protected function getRedirectUrl(): string
    {
        return ProgramaAcademicoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
