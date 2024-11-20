<?php

namespace App\Filament\Resources\GeneroBiologicoResource\Pages;

use App\Filament\Resources\GeneroBiologicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeneroBiologicos extends ListRecords
{
    protected static string $resource = GeneroBiologicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
