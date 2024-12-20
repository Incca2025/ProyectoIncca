<?php

namespace App\Filament\Resources\PensumAsignaturaResource\Pages;

use App\Filament\Resources\PensumAsignaturaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPensumAsignatura extends EditRecord
{
    protected static string $resource = PensumAsignaturaResource::class;

    protected function getRedirectUrl(): string
    {
        return PensumAsignaturaResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
