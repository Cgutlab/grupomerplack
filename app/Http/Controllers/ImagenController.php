<?php

namespace App\Http\Controllers;

use App\Imagen;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class ImagenController extends Controller
{
    function crearImagen($producto)
    {
        return view('adm.productos.imagen.create', compact('producto'));
    }

    function listarImagenes($producto)
    {
        $imagenes = Imagen::where('producto_id', $producto)->get();

        return view('adm.productos.imagen.list',  compact('imagenes', 'producto'));
    }

    function editarImagen($producto, $id)
    {
        $imagen = Imagen::find($id);
        
        return view('adm.productos.imagen.edit', compact('imagen', 'producto'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        $imagen = Imagen::create($datos);

        $file_save = Helpers::saveImage($request->file('imagen'), 'imagenes', $imagen->id);
        $file_save ? $imagen->imagen = $file_save : false;

        $imagen->save();
        $success = 'Imagen creada correctamente';
        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $imagen = Imagen::find($id);
        
        $file_save = Helpers::saveImage($request->file('imagen'), 'imagenes', $imagen->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $imagen->fill($datos);
        $imagen->save();
        $success = 'Imagen editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $imagen = Imagen::find($id);
        $imagen->delete();
        $success = 'Imagen eliminada correctamente';
        return back()->with('success', $success);
    }
}
