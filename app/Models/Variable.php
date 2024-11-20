<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    
    protected $table = 'variables';

    protected $primaryKey = 'IdVariable';

    protected $fillable = [
        'Variable',
        'DesVariable',
        'NumVariable',
        'TxtVariable',
    ];

}
