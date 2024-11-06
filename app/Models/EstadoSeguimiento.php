<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoSeguimiento extends Model
{
    protected $table = 'inter_estseguimiento';

    protected $primaryKey = 'IdIntEstSeguimiento';

    protected $fillable = [
        'DesIntEstSeguimiento',
    ];
}
