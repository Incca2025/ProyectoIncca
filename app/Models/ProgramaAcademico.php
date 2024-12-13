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
        'IdTipPeriodos', 
        'NumPeriodos', 
    ];

    public function nivel()
    {
        return $this->belongsTo(NivelPrograma::class, 'IdNivPrograma');
    }

    public function periodo()
    {
        return $this->belongsTo(PeriodoPensum::class, 'IdTipPeriodos');
    }

    public function interesados()
    {
        return $this->hasMany(Interesado::class);
    }

    
    
}
