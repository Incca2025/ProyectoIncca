<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComunidadNegra extends Model
{
    protected $table = 'tipcomnegra';
    protected $primaryKey = 'IdTipComNegra';
    
    protected $fillable = [
        'CodMenCN',
        'DesComNegra'
    ];

}
