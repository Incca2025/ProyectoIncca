<?php

namespace App\Filament\Resources\EstratoResource\Pages;

use App\Filament\Resources\EstratoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEstrato extends CreateRecord
{
    protected static string $resource = EstratoResource::class;

    protected function getRedirectUrl(): string
    {
        return EstratoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
