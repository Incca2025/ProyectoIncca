<?php

namespace App\Filament\Resources\SeguimientoResource\Pages;

use App\Filament\Resources\SeguimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeguimiento extends EditRecord
{
    protected static string $resource = SeguimientoResource::class;

    protected function getRedirectUrl(): string
    {
        return SeguimientoResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
