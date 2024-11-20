<?php

namespace App\Filament\Resources\PuebloIndigenaResource\Pages;

use App\Filament\Resources\PuebloIndigenaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPuebloIndigenas extends ListRecords
{
    protected static string $resource = PuebloIndigenaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
