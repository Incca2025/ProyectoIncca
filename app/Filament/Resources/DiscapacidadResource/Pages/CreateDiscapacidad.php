<?php

namespace App\Filament\Resources\DiscapacidadResource\Pages;

use App\Filament\Resources\DiscapacidadResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDiscapacidad extends CreateRecord
{
    protected static string $resource = DiscapacidadResource::class;

    protected function getRedirectUrl(): string
    {
        return DiscapacidadResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
