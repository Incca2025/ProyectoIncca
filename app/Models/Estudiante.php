<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiante';

    public $incrementing = false;

    protected $primaryKey = 'IdPersona';

    protected $fillable = [
        'IdPersona',
        'CodEstudiante',
        'EmailEstudiante',
        'IdEstEstudiante',
    ];

    public function personas() {
        return $this->belongsTo(Persona::class, 'IdPersona');
    }

    public function estud_estados() {
        return $this->belongsTo(EstudEstado::class, 'IdEstEstudiante');
    }

}
