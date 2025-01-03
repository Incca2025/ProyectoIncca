<?php

namespace App\Filament\Resources\PensumResource\Pages;

use App\Filament\Resources\PensumResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePensum extends CreateRecord
{
    protected static string $resource = PensumResource::class;

    protected function getRedirectUrl(): string
    {
        return PensumResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
