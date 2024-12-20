<?php

namespace App\Filament\Resources\GrupoEtnicoResource\Pages;

use App\Filament\Resources\GrupoEtnicoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGrupoEtnico extends CreateRecord
{
    protected static string $resource = GrupoEtnicoResource::class;

    protected function getRedirectUrl(): string
    {
        return GrupoEtnicoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
