<?php

namespace App\Filament\Resources\ComunidadNegraResource\Pages;

use App\Filament\Resources\ComunidadNegraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComunidadNegra extends EditRecord
{
    protected static string $resource = ComunidadNegraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
