<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgacaPeriodo extends Model
{
    protected $table = 'progaca_periodo';

    protected $primaryKey = ['IdProgAcademico', 'Peracademico'];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'Peracademico',
        'ValMatNuevos',
        'FecIniInscripciones',
        'FecFinInscripciones',
        'FecIniMatriculas',
        'FecFinMatriculas',
    ];

    public function getKeyName()
    {
        return $this->primaryKey;
    }

}
