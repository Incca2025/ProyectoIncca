<?php

namespace App\Filament\Resources\TipoProcesoResource\Pages;

use App\Filament\Resources\TipoProcesoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipoProceso extends EditRecord
{
    protected static string $resource = TipoProcesoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
