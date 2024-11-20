<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'inter_seguimientos';

    protected $primaryKey = 'IdIntSeguimiento';

    protected $fillable = [
        'IdInteresado',
        'IdIntTipSeguimiento',
        'ObsIntSeguimiento',
    ];

    public function interesado()
    {
        return $this->belongsTo(Interesado::class, 'IdInteresado');
    }

    public function tipoSeguimiento()
    {
        return $this->belongsTo(TipoSeguimiento::class, 'IdIntTipSeguimiento');
    }

    public function estadoSeguimiento()
    {
        return $this->belongsTo(EstadoSeguimiento::class, 'IdIntEstSeguimiento');
    }

}
