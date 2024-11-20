<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discapacidad extends Model
{
    protected $table = 'tipdiscapacidad';

    protected $primaryKey = 'IdTipDiscapacidad';

    protected $fillable = [
        'CodMenDiscap',
        'DesDiscapacidad'
    ];

}
