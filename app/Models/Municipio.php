<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'tipmunicipios';

    protected $primaryKey = 'IdTipMunicipio';

    protected $fillable = [
        'CodMunicipio',
        'DesMunicipio',
        'IdTipPais',
        'IdTipDepartamento'
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'IdTipPais');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'IdTipDepartamento');
    }

}
