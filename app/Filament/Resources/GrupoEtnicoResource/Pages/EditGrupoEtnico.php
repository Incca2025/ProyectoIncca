<?php

namespace App\Filament\Resources\GrupoEtnicoResource\Pages;

use App\Filament\Resources\GrupoEtnicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGrupoEtnico extends EditRecord
{
    protected static string $resource = GrupoEtnicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
