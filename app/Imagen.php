<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $fillable = [
        'producto_id', 'imagen', 'orden',
    ];

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
