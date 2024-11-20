<?php

namespace App\Filament\Resources\ZonaResidenciaResource\Pages;

use App\Filament\Resources\ZonaResidenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZonaResidencia extends EditRecord
{
    protected static string $resource = ZonaResidenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
