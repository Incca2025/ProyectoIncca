<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PensumAsignatura extends Model
{
    protected $table = 'pen_asignatura';
    protected $primaryKey = 'IdPen_Asignatura';
    
    protected $fillable = [
        'numPeriodo',
        'Electiva',
        'numCreditos',
        'IdPensum',
        'IdAsignatura',
        'NumCreditosPreRequisito',
        'NumHorClase',
    ];

    public function pensum()
    {
        return $this->belongsTo(Pensum::class, 'IdPensum');
    }

    public function asignaturas()
    {
        return $this->belongsTo(Asignatura::class, 'IdAsignatura');
    }

}
