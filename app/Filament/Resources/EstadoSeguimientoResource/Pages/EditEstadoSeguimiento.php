<?php

namespace App\Filament\Resources\EstadoSeguimientoResource\Pages;

use App\Filament\Resources\EstadoSeguimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstadoSeguimiento extends EditRecord
{
    protected static string $resource = EstadoSeguimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
