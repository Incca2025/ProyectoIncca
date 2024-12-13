<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartamentoAsignatura extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'IdDepartamento';
    
    protected $fillable = [
        'CodDepartamento',
        'DesDepartamento',
    ];

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, 'IdDepartamento', 'IdDepartamento');
    }

}
