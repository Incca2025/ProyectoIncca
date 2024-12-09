<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignaturas';
    protected $primaryKey = 'IdAsignatura';
    
    protected $fillable = [
        'CodAsignatura',
        'DesAsignatura',
        'IdDepartamento',
    ];

    public function departamento()
    {
        return $this->belongsTo(DepartamentoAsignatura::class, 'IdDepartamento', 'IdDepartamento');
    }

}
