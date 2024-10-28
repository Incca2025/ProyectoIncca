<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConDiscapacidad extends Model
{
    protected $table = 'tipcondiscapacidad';
    protected $primaryKey = 'IdTipConDiscapacidad';
    
    protected $fillable = [
        'CodMenCDiscap',
        'DesConDiscapacidad'
    ];

}
