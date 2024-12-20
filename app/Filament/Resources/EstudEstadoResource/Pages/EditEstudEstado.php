<?php

namespace App\Filament\Resources\EstudEstadoResource\Pages;

use App\Filament\Resources\EstudEstadoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstudEstado extends EditRecord
{
    protected static string $resource = EstudEstadoResource::class;

    protected function getRedirectUrl(): string
    {
        return EstudEstadoResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
