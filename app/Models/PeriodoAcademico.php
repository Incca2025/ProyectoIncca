<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    protected $table = 'tipperiodo';
    protected $primaryKey = 'IdTipPeriodo';
    
    protected $fillable = [
        'DesTipPeriod'
    ];

    public function programas()
    {
        return $this->hasMany(ProgramaAcademico::class);
    }

}
