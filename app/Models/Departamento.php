<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'tipdepartamentos';

    protected $primaryKey = 'IdTipDepartamento';

    protected $fillable = [
        'CodDepartamento',
        'DesDepartamento',
        'IdTipPais'
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'IdTipPais');
    }

    // public function municipios()
    // {
    //     return $this->hasMany(Municipio::class);
    // }
    

}
