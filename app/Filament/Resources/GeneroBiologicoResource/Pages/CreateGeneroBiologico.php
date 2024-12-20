<?php

namespace App\Filament\Resources\GeneroBiologicoResource\Pages;

use App\Filament\Resources\GeneroBiologicoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGeneroBiologico extends CreateRecord
{
    protected static string $resource = GeneroBiologicoResource::class;

    protected function getRedirectUrl(): string
    {
        return GeneroBiologicoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
