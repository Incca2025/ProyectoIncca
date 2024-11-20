<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PensumAsignatura extends Model
{
    protected $table = 'pen_asignatura';
    protected $primaryKey = 'idPen_Asignatura';
    
    protected $fillable = [
        'numPeriodo',
        'Electiva',
        'numCreditos',
        'IdPensum',
        'IdAsignatura',
    ];

}
