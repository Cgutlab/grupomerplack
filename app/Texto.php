<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    protected $fillable = [
        'orden', 'titulo', 'texto',
    ];
}
