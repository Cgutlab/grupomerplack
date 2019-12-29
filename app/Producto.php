<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'categoria_id', 'marca_id', 'descripcion',  'ficha', 'libre', 'codigo', 'keyword', 'destacado', 'oferta',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }
    
    public function imagenes()
    {
        return $this->hasMany('App\Imagen');
    }
}
