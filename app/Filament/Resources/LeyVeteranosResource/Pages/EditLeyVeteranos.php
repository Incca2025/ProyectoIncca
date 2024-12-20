<?php

namespace App\Filament\Resources\LeyVeteranosResource\Pages;

use App\Filament\Resources\LeyVeteranosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLeyVeteranos extends EditRecord
{
    protected static string $resource = LeyVeteranosResource::class;

    protected function getRedirectUrl(): string
    {
        return LeyVeteranosResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
