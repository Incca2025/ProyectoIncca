<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pensum extends Model
{
    protected $table = 'pensum';
    protected $primaryKey = 'IdPensum';
    
    protected $fillable = [
        'IdProgAcademico',
        'perAcademico_Inicial',
        'perAcademico_Final',
        'desPensum',
        'numCredAprob',
        'promMinimo',
        'numPeriodos',
        'IdTipPeriodos',
    ];

    public function programas()
    {
        return $this->belongsTo(ProgramaAcademico::class, 'IdProgAcademico');
    }

    public function periodos()
    {
        return $this->belongsTo(PeriodoPensum::class, 'IdTipPeriodos');
    }

}
