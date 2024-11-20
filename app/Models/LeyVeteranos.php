<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeyVeteranos extends Model
{
    protected $table = 'tipveteranos';

    protected $primaryKey = 'IdTipVeteranos';

    protected $fillable = [
        'CodMenVetarno',
        'DesVeterano'
    ];

}
