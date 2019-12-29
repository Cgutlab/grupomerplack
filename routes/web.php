<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@front');
Route::get('empresa', 'EmpresaController@front');
Route::get('catalogo/{familia}', 'ProductoController@categorias');
Route::get('catalogo/{familia}/{categoria}', 'ProductoController@productos');
Route::get('catalogo/{familia}/{categoria}/{producto}', 'ProductoController@detalle');
Route::get('ofertas', 'ProductoController@ofertas');
Route::get('sucursales', 'SucursalesController@front');
Route::get('atencion', 'AtencionController@front');
Route::get('formas', 'FormasController@front');
Route::get('contacto', 'ContactoController@front');
Route::get('solicitar/{id}', 'SolicitudController@add');
Route::get('solicitud', function (){ return view('solicitud'); });
Route::get('solicitud/delete/{id}', 'SolicitudController@delete');
Route::get('solicitud/enviar', 'SolicitudController@send');

Route::get('buscar', function (){
	return view('resultados');
});
Route::post('buscar', ['uses'=>'ProductoController@buscar','as'=>'search']);
Route::post('registrar', ['uses'=>'RevendedoresController@registrar','as'=>'registrar.revendedor']);
Route::post('asesoramiento', ['uses'=>'AtencionController@asesoramiento','as'=>'fomulario.asesoramiento']);


Route::group(['prefix' => 'adm'], function() {
	
	
	Route::resource('slider', 'SliderController');
	Route::resource('destacado', 'DestacadoController');
	Route::resource('item', 'ItemController');
	Route::resource('icono', 'IconoController');
	Route::resource('logo', 'LogoController');
	Route::resource('categoria', 'CategoriaController');
	Route::resource('producto', 'ProductoController');
	Route::resource('texto', 'TextoController');
	Route::resource('contacto', 'ContactoController');
	Route::resource('metadato', 'MetadatoController');
	Route::resource('user', 'UserController');
	Route::resource('social', 'SocialController');
	Route::resource('imagen', 'ImagenController');
	Route::resource('detalle', 'DetalleController');
	Route::resource('modelo', 'ModeloController');
	Route::resource('novedad', 'NovedadController');
	Route::resource('servicio', 'ServicioController');
	Route::resource('proyecto', 'ProyectoController');
	Route::resource('muestra', 'MuestraController');
	Route::resource('marca', 'MarcaController');

	//login

	Route::get('/', function (){
		return view('adm.login');
	});
	Route::get('index', function (){
		return view('adm.panel');
	});
	Route::post('ingresar', ['uses'=>'UserController@login','as'=>'adm.ingresar']);
	Route::get('logout', 'UserController@logout');

	//home

	Route::group(['prefix' => 'home'], function() {

		Route::group(['prefix' => 'slider'], function() {
			Route::get('create', 'HomeController@crearSlider');
			Route::get('edit', 'HomeController@listarSliders');
			Route::get('edit/{id}', 'HomeController@editarSlider');
		});

		Route::group(['prefix' => 'marca'], function() {
			Route::get('create', 'MarcaController@crearMarca');
			Route::get('edit', 'MarcaController@listarMarcas');
			Route::get('edit/{id}', 'MarcaController@editarMarca');
		});

		Route::group(['prefix' => 'item'], function() {
			Route::get('edit/{id}', 'HomeController@editarItem');
		});
	});

	//Empresa

	Route::group(['prefix' => 'empresa'], function() {

		Route::group(['prefix' => 'slider'], function() {
			Route::get('create', 'EmpresaController@crearSlider');
			Route::get('edit', 'EmpresaController@listarSliders');
			Route::get('edit/{id}', 'EmpresaController@editarSlider');
		});

		Route::group(['prefix' => 'item'], function() {
			Route::get('edit/{id}', 'EmpresaController@editarItem');
		});
	});

	//Productos

	Route::group(['prefix' => 'productos'], function() {

		Route::group(['prefix' => 'producto'], function() {
			Route::get('create/{familia}', 'ProductoController@crearProducto');
			Route::get('edit/{familia}', 'ProductoController@listarProductos');
			Route::post('edit/{familia}', 'ProductoController@listarPorCategoria');
			Route::get('edit/{familia}/{id}', 'ProductoController@editarProducto');
		});

		Route::group(['prefix' => 'categoria'], function() {
			Route::get('create/{familia}', 'CategoriaController@crearCategoria');
			Route::get('edit/{familia}', 'CategoriaController@listarCategorias');
			Route::get('edit/{familia}/{id}', 'CategoriaController@editarCategoria');
		});

		Route::group(['prefix' => 'imagen'], function() {
			Route::get('create/{producto}', 'ImagenController@crearImagen');
			Route::get('edit/{producto}', 'ImagenController@listarImagenes');
			Route::get('edit/{producto}/{id}', 'ImagenController@editarImagen');
		});
	});

	//Sucursales

	Route::group(['prefix' => 'sucursales'], function() {
		Route::group(['prefix' => 'texto'], function() {
			Route::get('edit/{id}', 'SucursalesController@editarTexto');
		});
	});

	//Revendedores

	Route::group(['prefix' => 'revendedores'], function() {
		Route::group(['prefix' => 'texto'], function() {
			Route::get('edit/{id}', 'RevendedoresController@editarTexto');
		});
		
	});

	//Atencion

	Route::group(['prefix' => 'atencion'], function() {
		Route::group(['prefix' => 'texto'], function() {
			Route::get('edit/{id}', 'AtencionController@editarTexto');
		});

		Route::group(['prefix' => 'icono'], function() {
			Route::get('create', 'AtencionController@crearIcono');
			Route::get('edit', 'AtencionController@listarIconos');
			Route::get('edit/{id}', 'AtencionController@editarIcono');
		});
	});

	//Formas

	Route::group(['prefix' => 'formas'], function() {
		Route::group(['prefix' => 'texto'], function() {
			Route::get('edit/{id}', 'AtencionController@editarTexto');
		});

		Route::group(['prefix' => 'item'], function() {
			Route::get('edit/{id}', 'EmpresaController@editarItem');
		});
	});

	Route::group(['prefix' => 'contactos'], function() {
		Route::group(['prefix' => 'contacto'], function() {
			Route::get('edit', 'ContactoController@listarContactos');
			Route::get('edit/{id}', 'ContactoController@editarContacto');
		});
	});

	Route::group(['prefix' => 'logos'], function() {
		Route::group(['prefix' => 'logo'], function() {
			Route::get('edit', 'LogoController@listarLogos');
			Route::get('edit/{id}', 'LogoController@editarLogo');
		});
	});

	Route::group(['prefix' => 'metadatos'], function() {

		Route::group(['prefix' => 'metadato'], function() {
			Route::get('edit', 'MetadatoController@listarMetadatos');
			Route::get('edit/{id}', 'MetadatoController@editarMetadato');
		});
	});

	Route::group(['prefix' => 'redes'], function() {
		Route::group(['prefix' => 'social'], function() {
			Route::get('create', 'SocialController@crearSocial');
			Route::get('edit', 'SocialController@listarSocials');
			Route::get('edit/{id}', 'SocialController@editarSocial');
		});
	});

	Route::group(['prefix' => 'usuarios'], function() {
		Route::group(['prefix' => 'usuario'], function() {
			Route::get('create', 'UserController@crearUsuario');
			Route::get('edit', 'UserController@listarUsuarios');
			Route::get('edit/{id}', 'UserController@editarUsuario');
		});
	});
});
