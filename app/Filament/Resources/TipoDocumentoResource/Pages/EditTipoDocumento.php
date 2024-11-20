<?php

namespace App\Filament\Resources\TipoDocumentoResource\Pages;

use App\Filament\Resources\TipoDocumentoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipoDocumento extends EditRecord
{
    protected static string $resource = TipoDocumentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
