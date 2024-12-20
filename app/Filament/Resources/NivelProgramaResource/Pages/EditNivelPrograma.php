<?php

namespace App\Filament\Resources\NivelProgramaResource\Pages;

use App\Filament\Resources\NivelProgramaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNivelPrograma extends EditRecord
{
    protected static string $resource = NivelProgramaResource::class;

    protected function getRedirectUrl(): string
    {
        return NivelProgramaResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
