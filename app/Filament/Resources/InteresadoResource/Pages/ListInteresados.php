<?php

namespace App\Filament\Resources\InteresadoResource\Pages;

use App\Filament\Resources\InteresadoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInteresados extends ListRecords
{
    protected static string $resource = InteresadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}
