<?php

namespace App\Filament\Resources\ProgacaPeriodoResource\Pages;

use App\Filament\Resources\ProgacaPeriodoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgacaPeriodo extends EditRecord
{
    protected static string $resource = ProgacaPeriodoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
