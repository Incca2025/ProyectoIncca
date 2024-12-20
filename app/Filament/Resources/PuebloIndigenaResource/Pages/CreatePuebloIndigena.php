<?php

namespace App\Filament\Resources\PuebloIndigenaResource\Pages;

use App\Filament\Resources\PuebloIndigenaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePuebloIndigena extends CreateRecord
{
    protected static string $resource = PuebloIndigenaResource::class;

    protected function getRedirectUrl(): string
    {
        return PuebloIndigenaResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
