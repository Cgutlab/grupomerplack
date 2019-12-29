<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Texto;
use App\Icono;
use App\Contacto;

class SucursalesController extends Controller
{
    function front()
    {
        $texto1 = Texto::find(1);
        $texto2 = Texto::find(2);
        $texto3 = Texto::find(3);
        $mapa1 = Contacto::find(6);
        $mapa2 = Contacto::find(7);
        $mapa3 = Contacto::find(8);
        
        return view('sucursales',compact('texto1','texto2','texto3','mapa1','mapa2','mapa3'));
    }

    function editarTexto($id)
    {
        $texto = Texto::find($id);
        return view('adm.sucursales.texto.edit', compact('texto'));
    }
}
