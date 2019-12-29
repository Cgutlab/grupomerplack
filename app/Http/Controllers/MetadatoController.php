<?php

namespace App\Http\Controllers;

use App\Metadato;
use Illuminate\Http\Request;

class MetadatoController extends Controller
{
    function listarMetadatos()
    {
        $metadatos = Metadato::all();

        return view('adm.metadatos.metadato.list',  compact('metadatos'));
    }

    function editarMetadato($id)
    {
        $metadato = Metadato::find($id);

        return view('adm.metadatos.metadato.edit', compact('metadato'));
    }

    public function update(Request $request, Metadato $metadato)
    {
        $datos = $request->all();
        
        $metadato->fill($datos);
        $metadato->save();
        $success = 'Metadato editado correctamente';
        return back()->with('success', $success);
    }
}
