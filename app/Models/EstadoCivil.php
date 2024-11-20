<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'tipestcivil';
    protected $primaryKey = 'IdTipEstCivil';
    
    protected $fillable = [
        'CodMenEstCivil',
        'DesEstCivil'
    ];

}
