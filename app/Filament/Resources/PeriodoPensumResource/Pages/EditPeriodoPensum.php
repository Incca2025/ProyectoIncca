<?php

namespace App\Filament\Resources\PeriodoPensumResource\Pages;

use App\Filament\Resources\PeriodoPensumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeriodoPensum extends EditRecord
{
    protected static string $resource = PeriodoPensumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
