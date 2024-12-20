<?php

namespace App\Filament\Resources\PeriodoPensumResource\Pages;

use App\Filament\Resources\PeriodoPensumResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePeriodoPensum extends CreateRecord
{
    protected static string $resource = PeriodoPensumResource::class;

    protected function getRedirectUrl(): string
    {
        return PeriodoPensumResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
