<?php

namespace App\Filament\Resources\NivelProgramaResource\Pages;

use App\Filament\Resources\NivelProgramaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNivelProgramas extends ListRecords
{
    protected static string $resource = NivelProgramaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
