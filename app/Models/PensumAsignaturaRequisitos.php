<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PensumAsignaturaRequisitos extends Model
{
    protected $table = 'pen_asignatura_requisitos';
    protected $primaryKey = 'IdPenRequisito';
    
    protected $fillable = [
        'IdPen_Asignatura',
        'IdAsignatura',
        'Prerequisito',
    ];

    public function pensumasignatura()
    {
        return $this->belongsTo(PensumAsignatura::class, 'IdPen_Asignatura');
    }
    
    public function asignaturas()
    {
        return $this->belongsTo(Asignatura::class, 'IdAsignatura');
    }

}
