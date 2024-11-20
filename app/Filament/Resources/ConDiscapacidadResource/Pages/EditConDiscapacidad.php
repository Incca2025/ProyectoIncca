<?php

namespace App\Filament\Resources\ConDiscapacidadResource\Pages;

use App\Filament\Resources\ConDiscapacidadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConDiscapacidad extends EditRecord
{
    protected static string $resource = ConDiscapacidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
