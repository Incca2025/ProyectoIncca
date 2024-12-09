<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class ProgacaPeriodo extends Model
{
    protected $table = 'progaca_periodo';

    protected $primaryKey = 'IdProgAcaPeriodo';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'IdProgAcademico',
        'Peracademico',
        'ValMatNuevos',
        'FecIniInscripciones',
        'FecFinInscripciones',
        'FecIniMatriculas',
        'FecFinMatriculas',
        'FecIniClases',
        'FecFinClases',
    ];

    public function programaAcademico()
    {
        return $this->belongsTo(ProgramaAcademico::class, 'IdProgAcademico');
    }

    public static function booted()
    {
        static::saving(function ($model) {
            $exists = static::where('IdProgAcademico', $model->IdProgAcademico)
                ->where('Peracademico', $model->Peracademico)
                ->exists();

            if ($exists) {
                throw ValidationException::withMessages([
                    'Peracademico' => 'La combinación del programa y periodo académico ya existe.',
                ]);
            }
        });
    }

}
