<?php

namespace App\Filament\Resources\DiscapacidadResource\Pages;

use App\Filament\Resources\DiscapacidadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiscapacidad extends EditRecord
{
    protected static string $resource = DiscapacidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
