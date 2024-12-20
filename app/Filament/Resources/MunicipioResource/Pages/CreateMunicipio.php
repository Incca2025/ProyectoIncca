<?php

namespace App\Filament\Resources\MunicipioResource\Pages;

use App\Filament\Resources\MunicipioResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMunicipio extends CreateRecord
{
    protected static string $resource = MunicipioResource::class;

    protected function getRedirectUrl(): string
    {
        return MunicipioResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}

