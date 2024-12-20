<?php

namespace App\Filament\Resources\PensumResource\Pages;

use App\Filament\Resources\PensumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPensum extends EditRecord
{
    protected static string $resource = PensumResource::class;

    protected function getRedirectUrl(): string
    {
        return PensumResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
