<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Imagen;
use App\Marca;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
	function buscar(Request $request)
	{
		$busqueda = $request->input('busqueda');
		$productos = Producto::where('nombre','like','%'.$busqueda.'%')->get();
		return view('resultados', compact('productos', 'busqueda'));
	}

	function detalle($familia, $categoria, $producto)
	{
		$categorias = Categoria::where('familia', $familia)->get();
		$producto = Producto::find($producto);
		$productos = Producto::whereHas('categoria', function($q) use ($familia){
			$q->where('familia',$familia);
		})->get();
		switch ($familia) {
			case 1:
				$titulo = 'Material Seco';
				break;
			case 2:
				$titulo = 'Pintureria';
				break;
			case 3:
				$titulo = 'Ropa de Trabajo';
				break;
			case 4:
				$titulo = 'Melaminas y Terciados';
				break;
		}

		return view('detalle', compact('productos', 'producto' , 'categorias', 'titulo'));
	}

	function productos($familia, $categoria)
	{
		$categorias = Categoria::where('familia', $familia)->get();
		$categoria = Categoria::find($categoria);
		switch ($familia) {
			case 1:
				$titulo = 'Material Seco';
				break;
			case 2:
				$titulo = 'Pintureria';
				break;
			case 3:
				$titulo = 'Ropa de Trabajo';
				break;
			case 4:
				$titulo = 'Melaminas y Terciados';
				break;
		}
		return view('productos',compact('categoria', 'categorias', 'titulo'));
	}

	function ofertas()
	{
		$productos = Producto::whereNotNull('oferta')->get();
		return view('ofertas', compact('productos'));
	}

	function categorias($familia)
	{
		$categorias = Categoria::where('familia', $familia)->get();
		switch ($familia) {
			case 1:
				$titulo = 'Material Seco';
				break;
			case 2:
				$titulo = 'Pintureria';
				break;
			case 3:
				$titulo = 'Ropa de Trabajo';
				break;
			case 4:
				$titulo = 'Melaminas y Terciados';
				break;
		}
		return view('categorias', compact('categorias', 'titulo'));
	}

	function crearProducto($familia)
	{
		$categorias = Categoria::where('familia',$familia)->get()->pluck('nombre', 'id');
		$marcas = Marca::all()->pluck('titulo', 'id');
		return view('adm.productos.producto.create', compact('categorias', 'marcas'));
	}

	function listarProductos($familia)
	{
		$productos = Producto::whereHas('categoria', function($q) use ($familia){
			$q->where('familia',$familia);
		})->get();

		return view('adm.productos.producto.list',  compact('productos', 'familia'));
	}

	function editarProducto($familia, $id)
	{
		$producto = Producto::find($id);
		$categorias = Categoria::all()->pluck('nombre', 'id');
		$marcas = Marca::all()->pluck('titulo', 'id');
		return view('adm.productos.producto.edit', compact('producto', 'categorias', 'marcas'));
	}

	public function store(Request $request)
	{
		$datos = $request->all();

		$producto = Producto::create($datos);

		$file_save = Helpers::saveImage($request->file('ficha'), 'productos',$producto->id.'_ficha');
		$file_save ? $producto->ficha = $file_save : false;
		
		$producto->save();
		$imagen = new Imagen();

		$file_save = Helpers::saveImage($request->file('imagen'), 'imagenes', $imagen->id.'_'.$producto->id);
		$file_save ? $imagen->imagen = $file_save : false;
		$imagen->orden = 'aa';
		$imagen->producto_id = $producto->id;
		$imagen->save();

		$success = 'Producto creado correctamente';

		return back()->with('success', $success);
	}

	public function update(Request $request, $id)
	{
		$datos = $request->all();
		$producto = Producto::find($id);

		$producto->fill($datos);

		$file_save = Helpers::saveImage($request->file('ficha'), 'productos',$producto->id.'_ficha');
		$file_save ? $producto->ficha = $file_save : false;
		
		$producto->save();
		$success = 'Producto editado correctamente';
		return back()->with('success', $success);
	}

	public function destroy($id)
	{
		$producto = Producto::find($id);
		$producto->delete();
		$success = 'Producto eliminado correctamente';
		return back()->with('success', $success);
	}
}
