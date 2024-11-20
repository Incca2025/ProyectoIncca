<?php

namespace App\Filament\Resources\PensumResource\Pages;

use App\Filament\Resources\PensumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPensums extends ListRecords
{
    protected static string $resource = PensumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
