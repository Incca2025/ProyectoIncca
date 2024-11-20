<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interesado extends Model
{
    protected $table = 'interesado';

    protected $primaryKey = 'IdInteresado';

    protected $fillable = [
        'Nombres_Int',
        'Apellidos_Int',
        'Email_Int',
        'IdProgAcademico',
        'Celular_Int',
        'IdIntEstSeguimiento',
    ];

    public function programa()
    {
        return $this->belongsTo(ProgramaAcademico::class, 'IdProgAcademico');
    }

    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class, 'IdInteresado');
    }

    public function estados() {
        return $this->belongsTo(EstadoSeguimiento::class, 'IdIntEstSeguimiento');
    }
    
}
