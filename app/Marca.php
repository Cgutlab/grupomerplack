<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'titulo', 'orden', 'imagen', 'vinculo',
    ];

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
