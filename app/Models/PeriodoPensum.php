<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodoPensum extends Model
{
    protected $table = 'tip_periodopensum';
    protected $primaryKey = 'IdTipPeriodos';
    
    protected $fillable = [
        'DesTipPeriodos',
        'NumMes'
    ];

    public function programas()
    {
        return $this->hasMany(ProgramaAcademico::class);
    }

}
