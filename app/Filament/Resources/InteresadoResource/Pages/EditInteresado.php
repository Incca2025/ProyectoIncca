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

            // Asegurar que haya valores en cada parte
            $primerNombre = $nombres[0] ?? '';
            $segundoNombre = $nombres[1] ?? '';
            $primerApellido = $apellidos[0] ?? '';
            $segundoApellido = $apellidos[1] ?? '';

            // Pasar los datos a la URL del resource PersonaEstudiante
            $this->redirect(PersonaEstudianteResource::getUrl('create', [
                'primer_nombre' => $primerNombre,
                'segundo_nombre' => $segundoNombre,
                'primer_apellido' => $primerApellido,
                'segundo_apellido' => $segundoApellido,
                'email' => $this->record->Email_Int,
                'celular' => $this->record->Celular_Int,
            ]));
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
