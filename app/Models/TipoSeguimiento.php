<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSeguimiento extends Model
{
    protected $table = 'inter_tipseguimiento';

    protected $primaryKey = 'IdIntTipSeguimiento';

    protected $fillable = [
        'DesTipSeguimiento',
        'ActivaMatricula',
        'InstTipSeguimiento'
    ];
}
