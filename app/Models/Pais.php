<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'tippaises';
    protected $primaryKey = 'IdTipPais';
    
    protected $fillable = [
        'CodPais',
        'DesPais'
    ];

}
