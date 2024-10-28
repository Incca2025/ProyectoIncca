<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelPrograma extends Model
{
    protected $table = 'nivprograma';
    protected $primaryKey = 'IdNivPrograma';
    
    protected $fillable = [
        'DesPrograma'
    ];

    public function programas()
    {
        return $this->hasMany(ProgramaAcademico::class);
    }

}
