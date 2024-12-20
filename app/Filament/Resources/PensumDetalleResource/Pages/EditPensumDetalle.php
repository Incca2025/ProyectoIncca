<?php

namespace App\Filament\Resources\PensumDetalleResource\Pages;

use App\Filament\Resources\PensumDetalleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPensumDetalle extends EditRecord
{
    protected static string $resource = PensumDetalleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
