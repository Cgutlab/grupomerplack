<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icono extends Model
{
    protected $fillable = [
        'orden', 'texto', 'imagen',
    ];
}
