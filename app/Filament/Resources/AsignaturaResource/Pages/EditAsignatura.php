<?php

namespace App\Filament\Resources\AsignaturaResource\Pages;

use App\Filament\Resources\AsignaturaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAsignatura extends EditRecord
{
    protected static string $resource = AsignaturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
