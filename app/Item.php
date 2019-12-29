<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'orden', 'titulo', 'imagen', 'texto',
    ];
}
