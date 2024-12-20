<?php

namespace App\Filament\Resources\LeyVeteranosResource\Pages;

use App\Filament\Resources\LeyVeteranosResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLeyVeteranos extends CreateRecord
{
    protected static string $resource = LeyVeteranosResource::class;

    protected function getRedirectUrl(): string
    {
        return LeyVeteranosResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
