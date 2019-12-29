<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Texto;
use App\Icono;

class RevendedoresController extends Controller
{
    function front()
    {
        $texto = Texto::find(5);
        
        return view('revendedores',compact('texto'));
    }

    function editarTexto($id)
    {
        $texto = Texto::find($id);
        return view('adm.revendedores.texto.edit', compact('texto'));
    }
}
