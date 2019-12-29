<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\User;
use Redirect;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function crearUsuario()
    {
        return view('adm.users.usuario.create',compact('section'));
    }

    function listarUsuarios()
    {
        $usuarios = User::all();
        $destacados_seccion = 'active';
        $usuarios_usuario_edit = 'active';

        return view('adm.users.usuario.list',  compact('usuarios'));
    }

    function editarUsuario($id)
    {
        $usuario = User::find($id);

        return view('adm.users.usuario.edit', compact('usuario'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        User::create($datos);
        $success = 'Usuario creado correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $usuario = User::find($id);
        $usuario->fill($datos);
        $usuario->save();
        $success = 'Usuario editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        $success = 'Usuario eliminado correctamente';
        return back()->with('success', $success);
    }

    public function login(LoginRequest $request){

    	$usuario = $users = DB::table('users')->where('usuario', $request->input('usuario'))->first();
        if(isset($usuario))
        {
            if($usuario->contrasenia == $request->input('contrasenia'))
            {
                session(['usuario' => $usuario->id]);
                session(['rol' => $usuario->tipo]);
                $nombre = $usuario->nombre;
                $apellido = $usuario->apellido;
                return view('adm.panel', compact('nombre', 'apellido'));
            }
            else
            {
                $error = "El usuario y/o contraseña son invalidos";
                return view('adm.login', compact('error'));
            }
        }
        else
        {
            $error = "El usuario y/o contraseña son invalidos";
            return view('adm.login', compact('error'));
        }
    }

    public function logout()
    {
        //Auth::logout();
        return Redirect::to('adm');
    }
}
