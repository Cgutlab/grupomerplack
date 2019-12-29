<?php

namespace App\Http\Controllers;

use App\Icono;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class IconoController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->all();

        $icono = Icono::create($datos);

        $file_save = Helpers::saveImage($request->file('imagen'), 'iconos', $icono->id);
        $file_save ? $icono->imagen = $file_save : false;

        $icono->save();
        $success = 'Icono creado correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $icono = Icono::find($id);

        $file_save = Helpers::saveImage($request->file('imagen'), 'iconos',$icono->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $icono->fill($datos);
        $icono->save();
        $success = 'Icono editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy(Icono $icono)
    {
        $icono->delete();
        $success = 'Icono eliminado correctamente';
        return back()->with('success', $success);
    }
}
