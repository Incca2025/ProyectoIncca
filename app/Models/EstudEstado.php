<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstudEstado extends Model
{
    protected $table = 'estud_estados';

    protected $primaryKey = 'IdEstEstudiante';

    protected $fillable = [
        'IdEstEstudiante',
        'DesEstEstudiante',
        'ActEstEstudiante',
    ];

}
