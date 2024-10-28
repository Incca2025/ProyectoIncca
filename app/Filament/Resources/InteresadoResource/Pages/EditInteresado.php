<?php

namespace App\Filament\Resources\InteresadoResource\Pages;

use App\Filament\Resources\InteresadoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInteresado extends EditRecord
{
    protected static string $resource = InteresadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
