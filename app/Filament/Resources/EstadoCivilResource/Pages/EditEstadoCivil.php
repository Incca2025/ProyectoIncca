<?php

namespace App\Filament\Resources\EstadoCivilResource\Pages;

use App\Filament\Resources\EstadoCivilResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstadoCivil extends EditRecord
{
    protected static string $resource = EstadoCivilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
