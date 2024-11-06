<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'inter_seguimientos';

    protected $primaryKey = 'IdIntSegumiento';

    protected $fillable = [
        'Id_Interesado',
        'IdIntTipSeguimiento',
        'IdIntEstSeguimiento',
        'ObsIntSeguimiento',
    ];

    public function interesado()
    {
        return $this->belongsTo(Interesado::class, 'Id_Interesado');
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
