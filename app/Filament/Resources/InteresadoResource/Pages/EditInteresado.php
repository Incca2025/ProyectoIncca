<?php

namespace App\Filament\Resources\InteresadoResource\Pages;

use App\Filament\Resources\InteresadoResource;
use App\Filament\Resources\PersonaEstudianteResource;
use App\Models\Interesado;
use Filament\Actions\Action;
use Filament\Pages\Actions\ButtonAction;
use Filament\Resources\Pages\EditRecord;

class EditInteresado extends EditRecord
{
    protected static string $resource = InteresadoResource::class;

    protected function afterSave(): void
    {
        // Verifica si el estado de seguimiento es 5
        if ($this->record->IdIntEstSeguimiento == 5) {
            // Obtener y dividir los nombres y apellidos del registro actual
            $nombres = explode(' ', $this->record->Nombres_Int, 2);
            $apellidos = explode(' ', $this->record->Apellidos_Int, 2);


            session([
                'primer_nombre' => $nombres[0] ?? '',
                'segundo_nombre' => $nombres[1] ?? '',
                'primer_apellido' => $apellidos[0] ?? '',
                'segundo_apellido' => $apellidos[1] ?? '',
                'email' => $this->record->Email_Int,
                'celular' => $this->record->Celular_Int,
            ]);
    
            $this->redirect(PersonaEstudianteResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Salir')
                ->url(InteresadoResource::getUrl('index'))
                ->icon('heroicon-o-arrow-left')
                ->color('danger'),
        ];
    }
}
