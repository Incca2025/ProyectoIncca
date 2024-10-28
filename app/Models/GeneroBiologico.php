<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneroBiologico extends Model
{
    protected $table = 'tipgenbiologico';
    protected $primaryKey = 'IdTipGenBiologico';
    
    protected $fillable = [
        'CodMenGBio',
        'DesGenBiologico'
    ];

}
