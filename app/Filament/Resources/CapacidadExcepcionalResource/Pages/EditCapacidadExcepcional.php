<?php

namespace App\Filament\Resources\CapacidadExcepcionalResource\Pages;

use App\Filament\Resources\CapacidadExcepcionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCapacidadExcepcional extends EditRecord
{
    protected static string $resource = CapacidadExcepcionalResource::class;

    protected function getRedirectUrl(): string
    {
        return CapacidadExcepcionalResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
