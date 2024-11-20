<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProceso extends Model
{
    protected $table = 'doc_tip_proceso';
    protected $primaryKey = 'IdDoc_TipProceso';
    
    protected $fillable = [
        'DesTipProceso',
    ];

}
