<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartamentoAsignatura extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'IdDepartamento';
    
    protected $fillable = [
        'DesDepartamento',
    ];

}
