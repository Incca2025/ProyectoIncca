<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'idRol';

    protected $fillable = [
        'rol',
        'descripcion',
    ];
}
