<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class CategoriaController extends Controller
{
    function crearCategoria($familia)
    {
        return view('adm.productos.categoria.create', compact('familia'));
    }

    function listarCategorias($familia)
    {
        $categorias = Categoria::where('familia',$familia)->get();

        return view('adm.productos.categoria.list',  compact('categorias', 'familia'));
    }

    function editarCategoria($familia, $id)
    {
        $categoria = Categoria::find($id);

        return view('adm.productos.categoria.edit', compact('categoria', 'familia'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        $categoria = Categoria::create($datos);

        $file_save = Helpers::saveImage($request->file('imagen'), 'categorias',$categoria->id);
        $file_save ? $categoria->imagen = $file_save : false;

        $categoria->save();
        $success = 'Categoria creada correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $categoria = Categoria::find($id);

        $file_save = Helpers::saveImage($request->file('imagen'), 'categorias',$categoria->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $categoria->fill($datos);
        $categoria->save();
        $success = 'Categoria editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        $success = 'Categoria eliminada correctamente';
        return back()->with('success', $success);
    }
}
