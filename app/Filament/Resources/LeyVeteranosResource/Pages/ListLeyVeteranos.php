<?php

namespace App\Filament\Resources\LeyVeteranosResource\Pages;

use App\Filament\Resources\LeyVeteranosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLeyVeteranos extends ListRecords
{
    protected static string $resource = LeyVeteranosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
