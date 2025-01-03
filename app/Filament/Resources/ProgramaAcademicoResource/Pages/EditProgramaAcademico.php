<?php

namespace App\Filament\Resources\ProgramaAcademicoResource\Pages;

use App\Filament\Resources\ProgramaAcademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramaAcademico extends EditRecord
{
    protected static string $resource = ProgramaAcademicoResource::class;

    protected function getRedirectUrl(): string
    {
        return ProgramaAcademicoResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
