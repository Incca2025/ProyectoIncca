<?php

namespace App\Filament\Resources\ConDiscapacidadResource\Pages;

use App\Filament\Resources\ConDiscapacidadResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateConDiscapacidad extends CreateRecord
{
    protected static string $resource = ConDiscapacidadResource::class;

    protected function getRedirectUrl(): string
    {
        return ConDiscapacidadResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
