<?php

namespace App\Filament\Resources\EstratoResource\Pages;

use App\Filament\Resources\EstratoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstratos extends ListRecords
{
    protected static string $resource = EstratoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
