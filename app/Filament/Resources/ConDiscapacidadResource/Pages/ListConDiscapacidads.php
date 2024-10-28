<?php

namespace App\Filament\Resources\ConDiscapacidadResource\Pages;

use App\Filament\Resources\ConDiscapacidadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConDiscapacidads extends ListRecords
{
    protected static string $resource = ConDiscapacidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
