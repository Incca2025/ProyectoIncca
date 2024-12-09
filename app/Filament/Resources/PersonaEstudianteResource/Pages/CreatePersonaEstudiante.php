<?php

namespace App\Filament\Resources\PersonaEstudianteResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\InteresadoResource;
use App\Filament\Resources\PersonaEstudianteResource;

class CreatePersonaEstudiante extends CreateRecord
{
    protected static string $resource = PersonaEstudianteResource::class;

    protected function getRedirectUrl(): string
    {
        return InteresadoResource::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Registros creados correctamente';
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
