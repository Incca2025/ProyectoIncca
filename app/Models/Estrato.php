<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estrato extends Model
{
    protected $table = 'tipestrato';
    protected $primaryKey = 'IdTipEstrato';
    
    protected $fillable = [
        'CodMenEstrato',
        'DesEstrato'
    ];

}
