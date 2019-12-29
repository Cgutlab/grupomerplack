<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use Redirect;
use App\Texto;

class ContactoController extends Controller
{
    function front()
    {
        $mapa1 = Contacto::find(6);
        $mapa2 = Contacto::find(7);
        $texto1 = Texto::find(3);
        $texto2 = Texto::find(4);
        return view('contacto',compact('texto1','texto2','mapa1','mapa2'));
    }

    function listarContactos()
    {
        $contactos = Contacto::all();
        return view('adm.contactos.contacto.list',  compact('contactos'));
    }

    function editarContacto($id)
    {
        $contacto = Contacto::find($id);
        return view('adm.contactos.contacto.edit', compact('contacto'));
    }

    public function update(Request $request, Contacto $contacto)
    {
        $datos = $request->all();
        
        $contacto->fill($datos);
        $contacto->save();
        $success = 'Contacto editado correctamente';
        return back()->with('success', $success);
    }
}
