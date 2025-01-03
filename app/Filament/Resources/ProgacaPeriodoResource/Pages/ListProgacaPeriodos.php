<?php

namespace App\Filament\Resources\ProgacaPeriodoResource\Pages;

use App\Filament\Resources\ProgacaPeriodoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgacaPeriodos extends ListRecords
{
    protected static string $resource = ProgacaPeriodoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
