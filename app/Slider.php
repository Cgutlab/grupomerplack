<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'titulo', 'subtitulo', 'imagen', 'seccion', 'orden',
    ];
}
