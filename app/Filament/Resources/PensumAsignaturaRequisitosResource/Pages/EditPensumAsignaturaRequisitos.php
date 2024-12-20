<?php

namespace App\Filament\Resources\PensumAsignaturaRequisitosResource\Pages;

use App\Filament\Resources\PensumAsignaturaRequisitosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPensumAsignaturaRequisitos extends EditRecord
{
    protected static string $resource = PensumAsignaturaRequisitosResource::class;

    protected function getRedirectUrl(): string
    {
        return PensumAsignaturaRequisitosResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
