<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CapacidadExcepcional extends Model
{
    protected $table = 'tipcapexcepcional';
    protected $primaryKey = 'IdTipCapExcepcional';
    
    protected $fillable = [
        'CodMenCExpc',
        'DesCapExcepcional'
    ];

}
