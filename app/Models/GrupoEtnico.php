<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoEtnico extends Model
{
    protected $table = 'tipgrupetnico';
    protected $primaryKey = 'IdTipGrupEtnico';
    
    protected $fillable = [
        'CodMenGEtnico',
        'DesGrupEtnico'
    ];

}
