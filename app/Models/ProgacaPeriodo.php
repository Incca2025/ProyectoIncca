<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgacaPeriodo extends Model
{
    protected $table = 'progaca_periodo';

    protected $primaryKey = 'IdProgAcaPeriodo';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'IdProgAcademico',
        'Peracademico',
        'ValMatNuevos',
        'FecIniInscripciones',
        'FecFinInscripciones',
        'FecIniMatriculas',
        'FecFinMatriculas',
        'FecIniClases',
        'FecFinClases',
    ];

    public function programaAcademico()
    {
        return $this->belongsTo(ProgramaAcademico::class, 'IdProgAcademico');
    }

}
