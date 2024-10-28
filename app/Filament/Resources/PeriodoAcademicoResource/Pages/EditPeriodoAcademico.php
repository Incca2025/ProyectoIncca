<?php

namespace App\Filament\Resources\PeriodoAcademicoResource\Pages;

use App\Filament\Resources\PeriodoAcademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeriodoAcademico extends EditRecord
{
    protected static string $resource = PeriodoAcademicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
