<?php

namespace App\Filament\Resources\DiscapacidadResource\Pages;

use App\Filament\Resources\DiscapacidadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiscapacidads extends ListRecords
{
    protected static string $resource = DiscapacidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
