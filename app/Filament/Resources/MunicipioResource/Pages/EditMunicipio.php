<?php

namespace App\Filament\Resources\MunicipioResource\Pages;

use App\Filament\Resources\MunicipioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMunicipio extends EditRecord
{
    protected static string $resource = MunicipioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
