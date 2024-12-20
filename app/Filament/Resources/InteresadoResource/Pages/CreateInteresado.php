<?php

namespace App\Filament\Resources\InteresadoResource\Pages;

use App\Filament\Resources\InteresadoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInteresado extends CreateRecord
{
    protected static string $resource = InteresadoResource::class;

    protected function getRedirectUrl(): string
    {
        return InteresadoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
