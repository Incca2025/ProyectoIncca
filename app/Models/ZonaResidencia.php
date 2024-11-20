<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZonaResidencia extends Model
{
    protected $table = 'tipzonaresidencia';

    protected $primaryKey = 'IdTipZonaResidencia';

    protected $fillable = [
        'CodMenZResidencial',
        'DesZonaResidencial'
    ];

}
