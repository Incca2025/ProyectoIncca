<?php

namespace App\Filament\Resources\ComunidadNegraResource\Pages;

use App\Filament\Resources\ComunidadNegraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComunidadNegras extends ListRecords
{
    protected static string $resource = ComunidadNegraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
