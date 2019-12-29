<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Extensions\Helpers;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    function crearMarca()
    {

        return view('adm.home.marca.create');
    }

    function listarMarcas()
    {
        $marcas = Marca::all();

        return view('adm.home.marca.list', compact('marcas'));
    }

    function editarMarca($id)
    {
        $marca = Marca::find($id);
        return view('adm.home.marca.edit', compact('marca'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $marca = Marca::create($datos);

        $file_save = Helpers::saveImage($request->file('imagen'), 'marcas', $marca->id);
        $file_save ? $marca->imagen = $file_save : false;

        $marca->save();
        $success = 'Marca creado correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $marca = Marca::find($id);

        $file_save = Helpers::saveImage($request->file('imagen'), 'marcas',$marca->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $marca->fill($datos);
        $marca->save();
        $success = 'Marca editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy(Marca $marca)
    {
        $marca->delete();
        $success = 'Marca eliminado correctamente';
        return back()->with('success', $success);
    }
}
