<?php

namespace App\Filament\Resources\SeguimientoResource\Pages;

use App\Filament\Resources\SeguimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSeguimiento extends ViewRecord
{
    protected static string $resource = SeguimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
