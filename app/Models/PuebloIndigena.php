<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuebloIndigena extends Model
{
    protected $table = 'tippueindigena';
    protected $primaryKey = 'IdTipPueIndigena';
    
    protected $fillable = [
        'CodMenPIndigena',
        'DesPueIndigena'
    ];

}
