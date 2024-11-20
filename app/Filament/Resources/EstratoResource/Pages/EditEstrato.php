<?php

namespace App\Filament\Resources\EstratoResource\Pages;

use App\Filament\Resources\EstratoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstrato extends EditRecord
{
    protected static string $resource = EstratoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
