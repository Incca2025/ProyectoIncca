<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipdocidentidad';
    protected $primaryKey = 'IdTipDocIdentidad';
    
    protected $fillable = [
        'AbreDocIdentidad',
        'DesDocidentidad',
        'DocDian'
    ];

}
