<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramaAcademico extends Model
{
    protected $table = 'progacademico';
    protected $primaryKey = 'IdProgAcademico';
    
    protected $fillable = [
        'NomProgAcademico', 
        'IdNivPrograma', 
        'ResMen', 
        'FecResMen', 
        'Snies', 
        'CodProgAcademico',
        'IdTipPeriodo', 
        'NumPeriodos', 
    ];

    public function nivel()
    {
        return $this->belongsTo(NivelPrograma::class, 'IdNivPrograma');
    }

    public function periodo()
    {
        return $this->belongsTo(PeriodoAcademico::class, 'IdTipPeriodo');
    }

    public function interesados()
    {
        return $this->hasMany(Interesado::class);
    }

    
    
}
