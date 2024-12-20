<?php

namespace App\Filament\Resources\NivelProgramaResource\Pages;

use App\Filament\Resources\NivelProgramaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNivelPrograma extends CreateRecord
{
    protected static string $resource = NivelProgramaResource::class;

    protected function getRedirectUrl(): string
    {
        return NivelProgramaResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
