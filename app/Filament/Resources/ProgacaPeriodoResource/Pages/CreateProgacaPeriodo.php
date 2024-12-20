<?php

namespace App\Filament\Resources\ProgacaPeriodoResource\Pages;

use App\Filament\Resources\ProgacaPeriodoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProgacaPeriodo extends CreateRecord
{
    protected static string $resource = ProgacaPeriodoResource::class;

    protected function getRedirectUrl(): string
    {
        return ProgacaPeriodoResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
